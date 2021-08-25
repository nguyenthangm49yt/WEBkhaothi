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
    //
    public function show()
    {
        $dotthis = DB::table('dotthi')->get();

        return view('dangkithi', ['dotthis' => $dotthis]);
    }

    public function detail(Request $request)
    {
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
            'dotthis' => $dotthis, 'dotthi' => $dotthi,
            'cathis' => $cathis, 'diemthis' => $diemthis,
            'baithis' => $baithis
        ]);
    }


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
            foreach ($id_baithis as $id_baithi) {
                $hosoduthi = DB::table('hosoduthi')->where('id_baithi', $id_baithi)->first();
                if ($hosoduthi) {
                    $check = false;
                    break;
                }
            }
            if ($check) {
                foreach ($id_baithis as $id_baithi) {
                    $newHosoduthi = new Hosoduthi();

                    $newHosoduthi->id_user = Auth::user()->id;

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

    public function updateshow(Request $request)
    {
        $dotthis = DB::table('hosoduthi')->where('id_user', Auth::user()->id)

            ->leftJoin('dotthi', 'hosoduthi.id_dotthi', '=', 'dotthi.id')
            ->select('dotthi.*', 'hosoduthi.id_dotthi')
            ->distinct()->get();


        return view('CNdangkithi', ['dotthis' => $dotthis]);
    }
    public function detail2(Request $request, $id)
    {

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

        $hosoduthi = DB::table('hosoduthi')->where('id_dotthi', $id)->get();
        $baithichecked = DB::table('hosoduthi')->select('id_baithi')->where('id_dotthi', $id)->pluck('id_baithi')->toArray();

        $cathichecked = DB::table('hosoduthi')
            ->rightJoin('dotthi_cathi', 'hosoduthi.id_cathi', '=', 'dotthi_cathi.id_cathi')

            ->where('dotthi_cathi.id_dotthi', $id)
            ->orderBy('dotthi_cathi.id_cathi', 'ASC')
            ->get();

        return view('detail2', [
            'dotthis' => $dotthis, 'dotthi' => $dotthi,
            'cathis' => $cathis, 'diemthis' => $diemthis,
            'baithis' => $baithis, 'hosoduthi' => $hosoduthi,
            'baithichecked' => $baithichecked, 'cathichecked' => $cathichecked
        ]);
    }


    // cap nhat dang kí thi
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

                $hoso = DB::table('hosoduthi')->where('id_dotthi', $id)->delete();

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
