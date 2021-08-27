<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Hoso;
use Auth;

class HosoController extends Controller
{
    //
    public function show()
    {
        $hoso = DB::table('hoso')->where('email', Auth::user()->email)->first();
        $dantoc = DB::table("dantoc")->get();
        $provinces = DB::table("provinces")->get();

        if (!$hoso)  return view(
            'hoso',
            [
                'provinces' => $provinces,
                'dantoc' => $dantoc
            ]
        );
        else {
            return redirect()->route('hoso.updateshow')->with('alert', 'Bạn đã có hồ sơ, bạn chỉ có thể cập nhật hồ sơ');
        }
    }
    public function store(Request $request)
    {
        //
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'g-recaptcha-response' => 'required',
                'name'       => 'required',
                'gender'   => 'required',
                'birthday'   => 'required',
                'place_of_birth'   => 'required',
                'nation_type'   => 'required',
                'cmnd'   => 'required',
                'date_create_cmnd'   => 'required',
                'place_create_cmnd'   => 'required',
                'hk_tinh'   => 'required',
                'hk_huyen'   => 'required',
                'avatar'   => 'required',
                'email'   => 'required',
                'phonenumber_dd'   => 'required',
                'phonenumber_cd'   => 'required',
                'sent_notice_to_person'   => 'required',
                'sent_notice_to_address'   => 'required',
                'uu_tien_type'   => 'required',
                'uu_tien_place'   => 'required',

                'lop10_tinh'   => 'required',
                'lop10_huyen'   => 'required',
                'lop10_truong'   => 'required',
                'lop11_tinh'   => 'required',
                'lop11_huyen'   => 'required',
                'lop11_truong'   => 'required',
                'lop12_tinh'   => 'required',
                'lop12_huyen'   => 'required',
                'lop12_truong'   => 'required',
                'lop10_diemki1'   => 'required',
                'lop10_diemki2'   => 'required',
                'lop10_diemtong'   => 'required',
                'lop11_diemki1'   => 'required',
                'lop11_diemki2'   => 'required',
                'lop11_diemtong'   => 'required',
                'lop12_diemki1'   => 'required',
                'lop12_diemki2'   => 'required',
                'lop12_diemtong'   => 'required',
                'nam_totnghiep'   => 'required',
                'dToan' => 'required',
                'dVan' => 'required',
                'dNgoaiNgu' => 'required',
                'dLy' => 'required',
                'dHoa' => 'required',
                'dSinh' => 'required',
                'dSu' => 'required',
                'dDia' => 'required',
                'dGdcd' => 'required',

            ]);
            if ($validator->fails()) {
                return redirect()->route('hoso.show')
                    ->withErrors($validator)
                    ->with('alert', 'Đăng kí hồ sơ thất bại, vui lòng điền đủ thông tin')
                    ->withInput();

            }

            $newHoso = new Hoso();

            $newHoso->id_user = Auth::user()->id;
            $newHoso->name = $request->name;
            $newHoso->email = $request->email;
            $newHoso->gender = $request->gender;
            $newHoso->birthday = $request->birthday;
            $newHoso->place_of_birth = $request->place_of_birth;
            $newHoso->nation_type = $request->nation_type;
            $newHoso->cmnd = $request->cmnd;
            $newHoso->date_create_cmnd = $request->date_create_cmnd;
            $newHoso->place_create_cmnd = $request->place_create_cmnd;
            $newHoso->hk_tinh = $request->hk_tinh;
            $newHoso->hk_huyen = $request->hk_huyen;

            // upload avatar
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('uploads'), $imageName);
            $newHoso->avatar =  $imageName;

            $newHoso->phonenumber_dd = $request->phonenumber_dd;
            $newHoso->phonenumber_cd = $request->phonenumber_cd;
            $newHoso->sent_notice_to_person = $request->sent_notice_to_person;
            $newHoso->sent_notice_to_address = $request->sent_notice_to_address;
            $newHoso->uu_tien_type = $request->uu_tien_type;
            $newHoso->uu_tien_place = $request->uu_tien_place;

            $newHoso->lop10_tinh = $request->lop10_tinh;
            $newHoso->lop10_huyen = $request->lop10_huyen;
            $newHoso->lop10_truong = $request->lop10_truong;
            $newHoso->lop11_tinh = $request->lop11_tinh;
            $newHoso->lop11_huyen = $request->lop11_huyen;
            $newHoso->lop11_truong = $request->lop11_truong;
            $newHoso->lop12_tinh = $request->lop12_tinh;
            $newHoso->lop12_huyen = $request->lop12_huyen;
            $newHoso->lop12_truong = $request->lop12_truong;

            $newHoso->lop10_diemki1 = $request->lop10_diemki1;
            $newHoso->lop10_diemki2 = $request->lop10_diemki2;
            $newHoso->lop10_diemtong = $request->lop10_diemtong;
            $newHoso->lop11_diemki1 = $request->lop11_diemki1;
            $newHoso->lop11_diemki2 = $request->lop11_diemki2;
            $newHoso->lop11_diemtong = $request->lop11_diemtong;
            $newHoso->lop12_diemki1 = $request->lop12_diemki1;
            $newHoso->lop12_diemki2 = $request->lop12_diemki2;
            $newHoso->lop12_diemtong = $request->lop12_diemtong;
            $newHoso->nam_totnghiep = $request->nam_totnghiep;

            $newHoso->dToan = $request->dToan;
            $newHoso->dVan = $request->dVan;
            $newHoso->dNgoaiNgu = $request->dNgoaiNgu;
            $newHoso->dLy = $request->dLy;
            $newHoso->dHoa = $request->dHoa;
            $newHoso->dSinh = $request->dSinh;
            $newHoso->dSu = $request->dSu;
            $newHoso->dDia = $request->dDia;
            $newHoso->dGdcd = $request->dGdcd;


            $newHoso->save();
            return redirect()->route('hoso.updateshow')->with('alert', 'Bạn đã tạo Hồ sơ thành công, bạn có thể đăng kí thi');
        }
    }
    public function updateshow(Request $request)
    {
        $hoso = DB::table('hoso')->where('email', Auth::user()->email)->first();

        if (!$hoso)  return redirect()->route('home')
        ->with('message', 'Bạn chưa có hồ sơ, vui lòng nhập hồ sơ');

        $provinces = DB::table("provinces")->get();
        $dantoc = DB::table("dantoc")->get();
        $hoso_hk_huyen = DB::table("districts")
            ->where('id', $hoso->hk_huyen)
            ->get("name")->first();
        $hoso_lop10_huyen = DB::table("districts")
            ->where('id', $hoso->lop10_huyen)
            ->get("name")->first();
        $hoso_lop11_huyen = DB::table("districts")
            ->where('id', $hoso->lop11_huyen)
            ->get("name")->first();
        $hoso_lop12_huyen = DB::table("districts")
            ->where('id', $hoso->lop12_huyen)
            ->get("name")->first();
        return view(
            'capNhatHS',
            [
                'hoso' => $hoso,
                'provinces' => $provinces,
                'dantoc' => $dantoc,
                "hoso_hk_huyen" => $hoso_hk_huyen,
                'hoso_lop10_huyen' => $hoso_lop10_huyen,
                'hoso_lop11_huyen' => $hoso_lop11_huyen,
                'hoso_lop12_huyen' => $hoso_lop12_huyen
            ]
        );
    }
    public function updatestore(Request $request)
    {
        $hoso = DB::table('hoso')->where('email', Auth::user()->email)->first();

        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required',
            'name'       => 'required',
            'gender'   => 'required',
            'birthday'   => 'required',
            'place_of_birth'   => 'required',
            'nation_type'   => 'required',
            'cmnd'   => 'required',
            'date_create_cmnd'   => 'required',
            'place_create_cmnd'   => 'required',
            'hk_tinh'   => 'required',
            'hk_huyen'   => 'required',
            'avatar'   => 'required',
            'email'   => 'required',
            'phonenumber_dd'   => 'required',
            'phonenumber_cd'   => 'required',
            'sent_notice_to_person'   => 'required',
            'sent_notice_to_address'   => 'required',
            'uu_tien_type'   => 'required',
            'uu_tien_place'   => 'required',

            'lop10_tinh'   => 'required',
            'lop10_huyen'   => 'required',
            'lop10_truong'   => 'required',
            'lop11_tinh'   => 'required',
            'lop11_huyen'   => 'required',
            'lop11_truong'   => 'required',
            'lop12_tinh'   => 'required',
            'lop12_huyen'   => 'required',
            'lop12_truong'   => 'required',
            'lop10_diemki1'   => 'required',
            'lop10_diemki2'   => 'required',
            'lop10_diemtong'   => 'required',
            'lop11_diemki1'   => 'required',
            'lop11_diemki2'   => 'required',
            'lop11_diemtong'   => 'required',
            'lop12_diemki1'   => 'required',
            'lop12_diemki2'   => 'required',
            'lop12_diemtong'   => 'required',
            'nam_totnghiep'   => 'required',
            'dToan' => 'required',
            'dVan' => 'required',
            'dNgoaiNgu' => 'required',
            'dLy' => 'required',
            'dHoa' => 'required',
            'dSinh' => 'required',
            'dSu' => 'required',
            'dDia' => 'required',
            'dGdcd' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('alert', 'Cập nhật thất bại')
                ->withInput();
        }
        $imageName = time() . '.' . $request->avatar->extension();
        $request->avatar->move(public_path('uploads'), $imageName);
        DB::table('hoso')
            ->where('email', $hoso->email)
            ->update([
                'name' => $request->name,
                'avatar' => $imageName,
                'email' => $request->email,
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'place_of_birth' => $request->place_of_birth,
                'nation_type' => $request->nation_type,
                'cmnd' => $request->cmnd,
                'date_create_cmnd' => $request->date_create_cmnd,
                'place_create_cmnd' => $request->place_create_cmnd,
                'hk_tinh' => $request->hk_tinh,
                'hk_huyen' => $request->hk_huyen,
                'phonenumber_dd' => $request->phonenumber_dd,
                'phonenumber_cd' => $request->phonenumber_cd,
                'sent_notice_to_person' => $request->sent_notice_to_person,
                'sent_notice_to_address' => $request->sent_notice_to_address,
                'uu_tien_type' => $request->uu_tien_type,
                'uu_tien_place' => $request->uu_tien_place,

                'lop10_tinh' => $request->lop10_tinh,
                'lop10_huyen' => $request->lop10_huyen,
                'lop10_truong' => $request->lop10_truong,

                'lop11_tinh' => $request->lop11_tinh,
                'lop11_huyen' => $request->lop11_huyen,
                'lop11_truong' => $request->lop11_truong,

                'lop12_tinh' => $request->lop12_tinh,
                'lop12_huyen' => $request->lop12_huyen,
                'lop12_truong' => $request->lop12_truong,

                'lop10_diemki1' => $request->lop10_diemki1,
                'lop10_diemki2' => $request->lop10_diemki2,
                'lop10_diemtong' => $request->lop10_diemtong,
                'lop11_diemki1' => $request->lop11_diemki1,
                'lop11_diemki2' => $request->lop11_diemki2,
                'lop11_diemtong' => $request->lop11_diemtong,
                'lop12_diemki1' => $request->lop12_diemki1,
                'lop12_diemki2' => $request->lop12_diemki2,
                'lop12_diemtong' => $request->lop12_diemtong,
                'nam_totnghiep' => $request->nam_totnghiep,

                'dToan' => $request->dToan,
                'dVan' => $request->dVan,
                'dNgoaiNgu' => $request->dNgoaiNgu,
                'dLy' => $request->dLy,
                'dHoa' => $request->dHoa,
                'dSinh' => $request->dSinh,
                'dSu' => $request->dSu,
                'dDia' => $request->dDia,
                'dGdcd' => $request->dGdcd,
            ]);

        return redirect()->route('hoso.updateshow')->with('alert', 'Cập nhật thành công');
    }


    //For fetching  Provinces
    public function getProvinces()
    {
        $provinces = DB::table("provinces")->get();
        return redirect()->route('hoso.updateshow')->with('provinces', $provinces);
    }

    //For fetching districts
    public function getDistricts($id)
    {
        $districts = DB::table("districts")
            ->where("province_id", $id)
            ->pluck("name", "id");
        return response()->json($districts);
    }

    //For fetching wards
    public function getWards($id)
    {
        $wards = DB::table("wards")
            ->where("district_id", $id)
            ->pluck("name", "id");
        return response()->json($wards);
    }
}
