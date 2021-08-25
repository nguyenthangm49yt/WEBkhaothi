<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Dotthi;
use App\Models\DotthiCathi;
use App\Models\Hosoduthi;
use Auth;

class TracuuController extends Controller
{
    // 
    public function showlist()
    {

        $dotthis = DB::table('hosoduthi')->where('id_user', Auth::user()->id)

            ->leftJoin('dotthi', 'hosoduthi.id_dotthi', '=', 'dotthi.id')
            ->select('dotthi.*', 'hosoduthi.id_dotthi')
            ->distinct()->get();


        return view('examregistered', ['dotthis' => $dotthis]);
    }
    public function show(Request $request, $id)
    {

        //thông tin thí sinh 
        $hoso = DB::table('hoso')->where('email', Auth::user()->email)->first();
        $hoso_hk_huyen = DB::table("districts")
            ->where('id', $hoso->hk_huyen)
            ->get("name")->first();
        $hoso_hk_tinh = DB::table("provinces")
            ->where('id', $hoso->hk_tinh)
            ->get("name")->first();

        // lấy thông tin về đăng kí đợt thi
        $hosoduthi = DB::table('hosoduthi')->where('hosoduthi.id_dotthi', $id)
            ->leftJoin('dotthi', 'hosoduthi.id_dotthi', '=', 'dotthi.id')
            ->leftJoin('diemthi', 'hosoduthi.id_diemthi', '=', 'diemthi.id')
            ->leftJoin('baithi', 'hosoduthi.id_baithi', '=', 'baithi.id')

            ->leftJoin('dotthi_cathi', function ($join) {
                $join->on('dotthi_cathi.id_cathi', '=', 'hosoduthi.id_cathi');
                $join->on('dotthi_cathi.id_dotthi', '=', 'hosoduthi.id_dotthi');
            })

            ->select(DB::raw('dotthi.name as dotthi_name,
                                      dotthi.ngay_bat_dau as ngay_bat_dau,
                                      dotthi.ngay_ket_thuc as ngay_ket_thuc,
                                      baithi.ten as baithi_name,
                                      diemthi.ten as diemthi_name,
                                      dotthi_cathi.ten as cathi_name,
                                      diemthi.dia_chi as diemthi_diachi'))
            ->get();


        return view('detail3', [
            'hoso' => $hoso,
            'hoso_hk_tinh' => $hoso_hk_tinh,
            'hoso_hk_huyen' => $hoso_hk_huyen,
            'hosoduthi' => $hosoduthi
        ]);
    }
}
