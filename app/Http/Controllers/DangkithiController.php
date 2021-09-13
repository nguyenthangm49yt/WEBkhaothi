<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Dotthi;
use App\Models\DotthiCathi;
use App\Models\Hosoduthi;
use Auth;


class DangkithiController extends Controller
{
    // đăng kí thi :show
    public function show()
    {
        $dotthis = DB::table('dotthi')->get();
        $hoso = DB::table('hoso')->where('email', Auth::user()->email)->first();
        if (!$hoso)  return redirect()->route('home')
        ->with('message', 'Bạn chưa có hồ sơ, vui lòng nhập hồ sơ');

        return view(
            'dangkithi',
            [
                'dotthis' => $dotthis,
                'hoso' => $hoso,
            ]
        );
    }

    // đăng kí thi :show detail
    public function detail(Request $request)
    {
        $hoso = DB::table('hoso')->where('email', Auth::user()->email)->first();
        $dotthis = DB::table('dotthi')->get();
        $dotthi = DB::table('dotthi')->where('id', $request->id)->first();
        $cathis = DB::table('dotthi_cathi')->where('id_dotthi', $request->id)
            ->leftJoin('cathi', 'dotthi_cathi.id_cathi', '=', 'cathi.id')
            ->get();

        $diemthis = DB::table('dotthi_diemthi')->where('id_dotthi', $request->id)
            ->leftJoin('diemthi', 'dotthi_diemthi.id_diemthi', '=', 'diemthi.id')
            ->get();
        $baithis = DB::table('baithi')->where('id_dotthi', $request->id)->get();
        return view('detail', [
            'hoso' => $hoso,
            'dotthis' => $dotthis, 'dotthi' => $dotthi,
            'cathis' => $cathis, 'diemthis' => $diemthis,
            'baithis' => $baithis
        ]);
    }

    // đăng kí thi : đăng kí
    public function store(Request $request, $id)
    {
        //
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'ckdiemthi'       => 'required',
                'ckbaithi'       => 'required',
                'ckcathi'       => 'required',

            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $id_dotthi = $id;
            $id_diemthi = $request->ckdiemthi;
            $id_baithis = $request->ckbaithi;
            $id_cathis = $request->ckcathi;

            $check = true;
            $id_user = Auth::user()->id;


            // check if the profile is newly created
            $hosoduthi = DB::table('hosoduthi')->where('id_user', $id_user)->first();
            if (!$hosoduthi) {
                $check = true;
            } else {

                // kiem tra xem bai thi da dươc dang ki hay chua?
                //  chi dươc dang ki 1 bai thi 1 lan trên 1 dot thi
                foreach ($id_baithis as $id_baithi) {
                    $hosoduthi_info = DB::table('hosoduthi')->where('id_baithi', $id_baithi)->first();
                    if ($hosoduthi_info && $id_user) {
                        $check = false;
                        break;
                    }
                }
            }

            // tao hosoduthi mới khi thoa man dieu kien
            if ($check) {
                foreach ($id_baithis as $id_baithi) {
                    $newHosoduthi = new Hosoduthi();

                    $newHosoduthi->id_user = $id_user;

                    $newHosoduthi->id_dotthi = $id;
                    $newHosoduthi->id_diemthi = $request->ckdiemthi;
                    $newHosoduthi->id_baithi = $id_baithi;
                    $newHosoduthi->id_cathi = $id_cathis[$id_baithi];

                    $newHosoduthi->save();
                }
                return redirect()->route('detail', ['id' => $id])->with('message', 'Bạn đã đăng kí thi thành công');
            } else {
                return redirect()->route('detail', ['id' => $id])->with('message', 'Bạn không thể đăng kí do bài thi bạn chọn đã được bạn đăng kí từ trước');
            }
        }
    }

    // CN đăng kí thi : show
    public function updateshow(Request $request)
    {
        $hoso = DB::table('hoso')->where('email', Auth::user()->email)->first();
        if (!$hoso)  return redirect()->route('home')
        ->with('message', 'Bạn chưa có hồ sơ, vui lòng nhập hồ sơ');

        $dotthis = DB::table('hosoduthi')->where('id_user', Auth::user()->id)

            ->leftJoin('dotthi', 'hosoduthi.id_dotthi', '=', 'dotthi.id')
            ->select('dotthi.*', 'hosoduthi.id_dotthi')
            ->distinct()->get();


        return view('CNdangkithi', [
            'hoso' => $hoso,
            'dotthis' => $dotthis
        ]);
    }

    // CN đăng kí thi : show detail
    public function detail2(Request $request, $id)
    {
        $hoso = DB::table('hoso')->where('email', Auth::user()->email)->first();

        // lấy thông tin về đợi thi
        $dotthis = DB::table('hosoduthi')->where('id_user', Auth::user()->id)

            ->leftJoin('dotthi', 'hosoduthi.id_dotthi', '=', 'dotthi.id')
            ->select('dotthi.*', 'hosoduthi.id_dotthi')
            ->distinct()->get();

        $dotthi = DB::table('dotthi')->where('id', $request->id)->first();

        $cathis = DB::table('dotthi_cathi')->where('id_dotthi', $request->id)
            ->leftJoin('cathi', 'dotthi_cathi.id_cathi', '=', 'cathi.id')
            ->get();

        $diemthis = DB::table('dotthi_diemthi')->where('id_dotthi', $request->id)
            ->leftJoin('diemthi', 'dotthi_diemthi.id_diemthi', '=', 'diemthi.id')
            ->get();
        $baithis = DB::table('baithi')->where('id_dotthi', $request->id)->get();


        // lấy thông tin về đăng kí đợt thi
        $hosoduthi = DB::table('hosoduthi')
            ->where('id_dotthi', $id)
            ->where('id_user', Auth::user()->id)
            ->get();

        $baithichecked = DB::table('hosoduthi')->select('id_baithi')
            ->where('id_dotthi', $id)
            ->where('id_user', Auth::user()->id)
            ->pluck('id_baithi')->toArray();

        // $cathichecked = DB::table('hosoduthi')

        //     ->where(function ($query) {
        //         $query->where('id_user', '=', Auth::user()->id);
        //         //   ->orWhere('id_user', '=', null);
        //     })

        $cathichecked = DB::table('hosoduthi')
            ->rightJoin('dotthi_cathi', 'hosoduthi.id_cathi', '=', 'dotthi_cathi.id_cathi')
            ->where('dotthi_cathi.id_dotthi', $id)
            // ->where('id_user', Auth::user()->id)
            ->orderBy('dotthi_cathi.id_cathi', 'ASC')
            ->get();

        return view('detail2', [
            'hoso' => $hoso,
            'dotthis' => $dotthis, 'dotthi' => $dotthi,
            'cathis' => $cathis, 'diemthis' => $diemthis,
            'baithis' => $baithis, 'hosoduthi' => $hosoduthi,
            'baithichecked' => $baithichecked, 'cathichecked' => $cathichecked
        ]);
    }


    // CN đăng kí thi : update
    public function updatestore(Request $request, $id)
    {


        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'ckdiemthi'       => 'required',
                'ckbaithi'       => 'required',
                'ckcathi'       => 'required',

            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }


            $id_dotthi = $id;
            $id_diemthi = $request->ckdiemthi;
            $id_baithis = $request->ckbaithi;
            $id_cathis = $request->ckcathi;

            if (count($id_baithis) != count($id_cathis)) {
                return redirect()->route('detail2', ['id' => $id])->with('message', 'Không thể sửa đăng kí thi, vui lòng nhập đủ thông tin');
            } else {
                // xóa dữ liệu cũ

                $hoso = DB::table('hosoduthi')
                    ->where('id_dotthi', $id)
                    ->where('id_user', Auth::user()->id)
                    ->delete();

                // thêm du liệu mới
                foreach ($id_baithis as $id_baithi) {
                    $newHosoduthi = new Hosoduthi();

                    $newHosoduthi->id_user = Auth::user()->id;

                    $newHosoduthi->id_dotthi = $id;
                    $newHosoduthi->id_diemthi = $request->ckdiemthi;
                    $newHosoduthi->id_baithi = $id_baithi;
                    $newHosoduthi->id_cathi = $id_cathis[$id_baithi];

                    $newHosoduthi->save();
                }
                return redirect()->route('detail2', ['id' => $id])->with('message', 'Bạn đã sửa đăng kí thi thành công');
            }
        }
    }
}
