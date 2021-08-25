<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    @if(session('alert'))

    {{session('alert')}}

    @endif

    <table border="0" bgcolor="#CCFFFF" width="100%" cellpading="0" cellspacing="0">
        <tbody>
            <tr>
                <td width="40%" style="font-size: 24; color: #0000FF">&nbsp;&nbsp; Cập nhật Hồ sơ dự thi</td>
                <td align="right" style="font-size: 12;">Người dùng: &nbsp;<b>{{Auth::user()->email}}</b></td>
            </tr>
        </tbody>
    </table>
    <form id="form_hoso_update" action="{{route('hoso.updatestore')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field()}}
        <hr>


        <div>
            <fieldset class="styleset">
                <legend><b>A. THÔNG TIN CÁ NHÂN ({{Auth::user()->email}})</b></legend>
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family: Times New Roman; font-size: 12pt">

                    <tbody>
                        <tr height="32">
                            <td width="19%"></td>
                            <td width="11%"></td>
                            <td width="17%"></td>
                            <td width="9%"></td>

                            <td width="11%"></td>
                            <td width="20%"></td>
                            <td rowspan="5" align="right">
                                <img id="ViewAnhhoso" src="{{asset('uploads/' . $hoso->avatar)}}" style="height:150px;width:115px">
                            </td>
                        </tr>

                        <tr height="32">
                            <td>1. Họ, chữ đệm và tên: </td>
                            <td colspan="2"><input type="text" name="name" size="30" value="{{$hoso->name}}" style="height:28;width:100%;font-size: 12pt"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Giới tính: </td>
                            <td>
                                Nam <input type="radio" name="gender" value="0" {{($hoso->gender == 0) ? "checked": ""}}>
                                Nữ<input type="radio" name="gender" value="1" {{($hoso->gender == 1) ? "checked": ""}}>
                            </td>

                            <td></td>
                        </tr>
                        <tr height="32">
                            <td>3. Ngày sinh:</td>
                            <td><input type="Date" name="birthday" value="{{$hoso->birthday}}" title="Chọn ngày trong bảng. Nếu không được hỗ trợ chọn thì nhập : yyyy-mm-dd" placeholder="yyyy-mm-dd"></td>
                            <td>       4. Nơi sinh:</td>
                            <td><input type="text" name="place_of_birth" value="{{$hoso->place_of_birth}}"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Dân tộc:</td>
                            <td><select size="1" name="nation_type" style="height:27px;font-size:12pt">;<option value="0"> -Chọn dân tộc- </option>

                                    @foreach($dantoc as $key => $dt)
                                    <option value="{{$key+1}}" {{($hoso->nation_type == $key+1)? "selected" : ""}}>
                                        {{$dt->name}}
                                    </option>
                                    @endforeach
                                </select></td>

                        </tr>
                        <tr height="32">
                            <td>6. Số CMND/CCCD</td>
                            <td><input type="text" name="cmnd" size="15" value="{{$hoso->cmnd}}" onchange="cet_SCMNNvalid();"></td>
                            <td>       7. Ngày cấp:</td>
                            <td><input type="Date" name="date_create_cmnd" value="{{$hoso->date_create_cmnd}}" title="Chọn ngày trong bảng. Nếu không được hỗ trợ chọn thì nhập : yyyy-mm-dd" placeholder="yyyy-mm-dd"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8. Nơi cấp:</td>
                            <td><input type="text" name="place_create_cmnd" size="15" value="{{$hoso->place_create_cmnd}}"></td>

                        </tr>
                        <tr height="32">
                            <td colspan="5">9. Hộ khẩu thường trú: &nbsp;Tỉnh/Tp:&nbsp;

                                <select id="hk_tinh" name="hk_tinh" style="font-size:11pt;height:27px;">
                                    <option value=""> -Chọn Tỉnh/Tp- </option>
                                    @foreach ($provinces as $province)
                                    <option value="{{$province->id}}" {{($hoso->hk_tinh == $province->id )? "selected":""}}>
                                        {{$province->name}}
                                    </option>
                                    @endforeach
                                </select>

                                 &nbsp; Huyện/Quận/Thị xã: &nbsp;
                                <select size="1" id="hk_huyen" name="hk_huyen" style="height:27px;font-size:11pt">
                                    <option value="{{$hoso->hk_huyen}}">
                                        {{$hoso_hk_huyen->name}}
                                    </option>
                                </select>


                                   10. Ảnh hồ sơ (*.jpg, tỷ lệ 4:6)
                            </td>
                            <td colspan="1">
                                <input type="file" id="avatar" name="avatar" value="{{asset('uploads/' . $hoso->avatar)}}" onchange="ImagesFileLoad(this)" />
                            </td>

                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div>
        <br>

        <div>
            <fieldset class="styleset">
                <legend><b>B. THÔNG TIN LIÊN HỆ</b></legend>
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family: Times New Roman; font-size: 12pt">
                    <tbody>
                        <tr>
                            <td width="19%"></td>
                            <td width="20%"></td>
                            <td width="13%"></td>
                            <td width="15%"></td>
                            <td width="23%"></td>
                            <td></td>
                        </tr>
                        <tr height="32">
                            <td>11. Địa chỉ Email: </td>
                            <td colspan="1"><input type="text" name="email" size="30" value="{{Auth::user()->email}}" style="height:28;width:100%;font-size: 12pt" readonly="readonly"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12. Điện thoại</td>
                            <td> Di động: &nbsp;<input type="text" name="phonenumber_dd" value="{{$hoso->phonenumber_dd}}" style="height:28;width:60%;font-size: 12pt"></td>
                            <td colspan="2"> Điện thoại Cố định (<i>nếu có</i>) : &nbsp;<input type="text" name="phonenumber_cd" value="{{$hoso->phonenumber_cd}}" style="height:28;width:45%;font-size: 12pt"></td>

                        </tr>
                        <tr height="32">
                            <td colspan="2">13. Gửi thông báo qua đường bưu điện cho :</td>
                            <td colspan="4"><input type="text" name="sent_notice_to_person" value="{{$hoso->sent_notice_to_person}}" style="height:28;width:100%;font-size: 12pt"></td>


                        </tr>
                        <tr height="32">
                            <td>14. Địa chỉ:</td>
                            <td colspan="5"><input type="text" name="sent_notice_to_address" value="{{$hoso->sent_notice_to_address}}" size="15" style="height:28;width:100%;font-size: 12pt"></td>


                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div><br>
        <div>
            <fieldset class="styleset">
                <legend><b>C. THÔNG TIN PHỤC VỤ THI ĐGNL</b></legend>
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family: Times New Roman; font-size: 12pt">
                    <tbody>
                        <tr>
                            <td width="17%"></td>
                            <td width="14%"></td>
                            <td width="13%"></td>
                            <td width="13%"></td>
                            <td width="11%"></td>
                            <td></td>
                        </tr>
                        <tr height="32">
                            <td>15. Đối tượng ưu tiên: </td>
                            <td>
                                <select size="1" name="uu_tien_type" style="height:27px;font-size:12pt">;
                                    <option value="0" {{($hoso->uu_tien_type == 0 )? "selected":""}}> -Không ưu tiên- </option>
                                    @for($i = 1; $i < 8; $i++) <option value="{{$i}}" {{($hoso->uu_tien_type == $i )? "selected":""}}>Ưu tiên {{$i}} </option>
                                        @endfor
                                </select>
                            </td>
                            <td>  16. Khu vực</td>
                            <td><select size="1" name="uu_tien_place" style="height:27px;font-size:12pt">;<option value="0"> -Chọn khu vực- </option>
                                    <option value="1" {{($hoso->uu_tien_place == "1" )? "selected":""}}>Khu vực 1 </option>
                                    <option value="2" {{($hoso->uu_tien_place == "2" )? "selected":""}}>Khu vực 2 </option>
                                    <option value="2NT" {{($hoso->uu_tien_place == "2NT" )? "selected":""}}>Khu vực 2 nông thôn </option>
                                    <option value="3" {{($hoso->uu_tien_place == "3" )? "selected":""}}>Khu vực 3 </option>
                                </select> </td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr height="32">
                            <td colspan="6">17. Nơi học THPT hoặc tương đương</td>
                        </tr>
                        <tr height="32">

                            <td> Năm lớp 10 - Tỉnh/Thành phố:</td>
                            <td>
                                <select size="1" id="Tinhlop10" name="lop10_tinh" style="font-size:11pt;height:27px;">
                                    <option value=""> -Chọn Tỉnh/Tp- </option>
                                    @foreach ($provinces as $province)
                                    <option value="{{$province->id}}" {{($hoso->lop10_tinh == $province->id )? "selected":""}}>
                                        {{$province->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td> Quận/Huyện/Thị xã:</td>
                            <td>
                                <select size="1" id="Huyenlop10" name="lop10_huyen" style="height:27px;font-size:11pt">
                                    <option value="{{$hoso->lop10_huyen}}">
                                        {{$hoso_lop10_huyen->name}}
                                    </option>
                                </select>
                            </td>

                            <td> Trường THPT: </td>
                            <td colspan="1">
                                <input type="text" name="lop10_truong" value="{{$hoso->lop10_truong}}" style="height:28;width:45%;font-size: 12pt">
                            </td>
                        </tr>

                        <tr height="32">
                            <td> Năm lớp 11 - Tỉnh/Thành phố:</td>
                            <td>
                                <select size="1" id="Tinhlop11" name="lop11_tinh" style="font-size:11pt;height:27px;">
                                    <option value=""> -Chọn Tỉnh/Tp- </option>
                                    @foreach ($provinces as $province)
                                    <option value="{{$province->id}}" {{($hoso->lop11_tinh == $province->id )? "selected":""}}>
                                        {{$province->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td> Quận/Huyện/Thị xã:</td>
                            <td>
                                <select size="1" id="Huyenlop11" name="lop11_huyen" style="height:27px;font-size:11pt">
                                    <option value="{{$hoso->lop11_huyen}}">
                                        {{$hoso_lop11_huyen->name}}
                                    </option>
                                </select>


                            </td>

                            <td> Trường THPT: </td>
                            <td colspan="1">
                                <input type="text" name="lop11_truong" value="{{$hoso->lop11_truong}}" style="height:28;width:45%;font-size: 12pt">
                            </td>
                        </tr>

                        <tr height="32">
                            <td> Năm lớp 12 - Tỉnh/Thành phố:</td>
                            <td>
                                <select size="1" id="Tinhlop12" name="lop12_tinh" style="font-size:11pt;height:27px;">
                                    <option value=""> -Chọn Tỉnh/Tp- </option>
                                    @foreach ($provinces as $province)
                                    <option value="{{$province->id}}" {{($hoso->lop12_tinh == $province->id )? "selected":""}}>
                                        {{$province->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td> Quận/Huyện/Thị xã:</td>
                            <td>
                                <select size="1" id="Huyenlop12" name="lop12_huyen" style="height:27px;font-size:11pt">
                                    <option value="{{$hoso->lop12_huyen}}">
                                        {{$hoso_lop12_huyen->name}}
                                    </option>
                                </select>


                            </td>

                            <td> Trường THPT: </td>
                            <td colspan="1">
                                <input type="text" name="lop12_truong" value="{{$hoso->lop12_truong}}" style="height:28;width:45%;font-size: 12pt">
                            </td>

                        </tr>
                    </tbody>
                </table>
                18. Trung bình chung học tập:
                <table width="100%" border="1" cellpadding="0" cellspacing="0" style="font-family: Times New Roman; font-size: 12pt">
                    <tbody>
                        <tr height="32">
                            <td width="33%" align="center" "=""><b>Lớp 10</b> </td><td cwidth=" 33%" align="center" "=""><b>Lớp 11</b> </td><td align=" center"><b>Lớp 12 </b></td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align="center">HK I</td>
                                            <td align="center">HK II </td>
                                            <td align="center"> Cả năm</td>
                                        </tr>
                                        <tr>
                                            <td align="center"><input type="text" id='lop10_diemki1' name="lop10_diemki1" value="{{$hoso->lop10_diemki1}}" style="text-align: center;height:28;width:80%;font-size: 12p" onchange="checkdiem1()"></td>
                                            <td align="center"><input type="text" id='lop10_diemki2' name="lop10_diemki2" value="{{$hoso->lop10_diemki2}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="checkdiem1()"> </td>
                                            <td align="center"><input type="text" id='lop10_diemtong' name="lop10_diemtong" value="{{$hoso->lop10_diemtong}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(L10CN);" readonly="readonly"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align="center">HK I</td>
                                            <td align="center">HK II </td>
                                            <td align="center"> Cả năm</td>
                                        </tr>
                                        <tr>
                                            <td align="center"><input type="text" id='lop11_diemki1' name="lop11_diemki1" value="{{$hoso->lop11_diemki1}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="checkdiem2()"></td>
                                            <td align="center"><input type="text" id='lop11_diemki2' name="lop11_diemki2" value="{{$hoso->lop11_diemki2}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="checkdiem2()"> </td>
                                            <td align="center"><input type="text" id='lop11_diemtong' name="lop11_diemtong" value="{{$hoso->lop11_diemtong}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(L11CN);" readonly="readonly"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td align="center">HK I</td>
                                            <td align="center">HK II (*) </td>
                                            <td align="center"> Cả năm (*)</td>
                                        </tr>
                                        <tr>
                                            <td align="center"><input type="text" id='lop12_diemki1' name="lop12_diemki1" value="{{$hoso->lop12_diemki1}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="checkdiem3()"></td>
                                            <td align="center"><input type="text" id='lop12_diemki2' name="lop12_diemki2" value="{{$hoso->lop12_diemki2}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="checkdiem3()"> </td>
                                            <td align="center"><input type="text" id='lop12_diemtong' name="lop12_diemtong" value="{{$hoso->lop12_diemtong}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(L12CN);" readonly="readonly"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div><br>
        <div>
            <fieldset class="styleset">
                <legend><b>D. THÔNG TIN TỐT NGHIỆP</b></legend>
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family: Times New Roman; font-size: 12pt">
                    <tbody>
                        <tr>
                            <td width="10%"></td>
                            <td width="11%"></td>
                            <td width="11%"></td>
                            <td width="11%"></td>
                            <td width="11%"></td>
                            <td width="11%"></td>
                            <td width="11%"></td>
                            <td width="11%"></td>
                            <td></td>
                        </tr>
                        <tr height="32">
                            <td colspan="9">19. Năm tốt nghiệp THPT (*): <input type="text" name="nam_totnghiep" value="{{$hoso->nam_totnghiep}}" style="height:28;width:10%;font-size: 12pt"></td>
                        </tr>
                        <tr height="32">
                            <td colspan="9">20. Kết quả tốt nghiệp THPT (*)</td>
                        </tr>
                        <tr height="32">
                            <td align="center"><b>Toán</b></td>
                            <td align="center"><b>Văn</b></td>
                            <td align="center"><b>Ngoại ngữ</b></td>
                            <td align="center"><b>Lý</b></td>
                            <td align="center"><b>Hóa</b></td>
                            <td align="center"><b>Sinh</b></td>
                            <td align="center"><b>Sử</b></td>
                            <td align="center"><b>Địa</b></td>
                            <td align="center"><b>GDCD</b></td>
                        </tr>
                        <tr>
                            <td align="center"><input type="text" name="dToan" value="{{$hoso->dToan}}" style="text-align: center;height:28;width:80%;font-size: 12p" onchange="JavaScript:checkdiem(dToan);"></td>
                            <td align="center"><input type="text" name="dVan" value="{{$hoso->dVan}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dVan);"> </td>
                            <td align="center"><input type="text" name="dNgoaiNgu" value="{{$hoso->dNgoaiNgu}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dNgoaingu);"></td>

                            <td align="center"><input type="text" name="dLy" value="{{$hoso->dLy}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dLy);"></td>
                            <td align="center"><input type="text" name="dHoa" value="{{$hoso->dHoa}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dHoa);"> </td>
                            <td align="center"><input type="text" name="dSinh" value="{{$hoso->dSinh}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dSinh);"></td>

                            <td align="center"><input type="text" name="dSu" value="{{$hoso->dSu}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dSu);"></td>
                            <td align="center"><input type="text" name="dDia" value="{{$hoso->dDia}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dDia);"> </td>
                            <td align="center"><input type="text" name="dGdcd" value="{{$hoso->dGdcd}}" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dGDCD);"></td>

                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div><br>
        <table border="0">
            <tbody>
                <tr>
                    <td width="40%">
                        <div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="6Lc7qAgcAAAAAKJhMxa2eJEVYEwLH3ubePbvF9pR"></div>
                        @if ($errors->has('g-recaptcha-response'))
                        {{$errors->first('g-recaptcha-response')}}
                        @endif
                    </td>
                    <td width="46%" align="center">


                        <button type="submit">
                            Ghi nhận
                        </button>

                        <input name="Send" type="hidden" value=""><a href="{{route('home')}}" class="button" ;font-size:="" 12pt;font-weight:bold;"="">Quay lại</a>&nbsp;<a href="#" class="button">Đăng ký đợt thi</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>


    <script>
        function ImagesFileLoad(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader(input);

                reader.onload = function() {
                    $("#ViewAnhhoso").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
    <script>
        function checkdiem1() {
            var total = 0;
            total = parseInt($('#lop10_diemki1').val()) + parseInt($('#lop10_diemki2').val());
            total /= 2;
            lop10_diemtong = document.getElementById('lop10_diemtong');
            lop10_diemtong.value = total;
        }
    </script>

    <script>
        function checkdiem2() {
            var total = 0;
            total = parseInt($('#lop11_diemki1').val()) + parseInt($('#lop11_diemki2').val());
            total /= 2;
            lop10_diemtong = document.getElementById('lop11_diemtong');
            lop10_diemtong.value = total;
        }
    </script>

    <script>
        function checkdiem3() {
            var total = 0;
            total = parseInt($('#lop12_diemki1').val()) + parseInt($('#lop12_diemki2').val());
            total /= 2;
            lop10_diemtong = document.getElementById('lop12_diemtong');
            lop10_diemtong.value = total;
        }
    </script>

    <script type=text/javascript>
        $('#hk_tinh').on('change', function() {
            console.log(this.value);
            var cid = $(this).val();
            if (cid) {
                $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/districts/" + cid,
                    success: function(res) {
                        console.log(res);
                        if (res) {
                            $("#hk_huyen").empty();

                            $("#hk_huyen").append('<option>-Chọn Huyện/Quận-</option>');
                            $.each(res, function(key, value) {
                                $("#hk_huyen").append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    }

                });
            }
        });
    </script>

    <script type=text/javascript>
        $('#Tinhlop10').on('change', function() {
            console.log(this.value);
            var cid = $(this).val();
            if (cid) {
                $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/districts/" + cid,
                    success: function(res) {
                        console.log(res);
                        if (res) {
                            $("#Huyenlop10").empty();

                            $("#Huyenlop10").append('<option>-Chọn Huyện/Quận-</option>');
                            $.each(res, function(key, value) {
                                $("#Huyenlop10").append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    }

                });
            }
        });
    </script>

    <script type=text/javascript>
        $('#Tinhlop11').on('change', function() {
            console.log(this.value);
            var cid = $(this).val();
            if (cid) {
                $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/districts/" + cid,
                    success: function(res) {
                        console.log(res);
                        if (res) {
                            $("#Huyenlop11").empty();

                            $("#Huyenlop11").append('<option>-Chọn Huyện/Quận-</option>');
                            $.each(res, function(key, value) {
                                $("#Huyenlop11").append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    }

                });
            }
        });
    </script>
    <script type=text/javascript>
        $('#Tinhlop12').on('change', function() {
            console.log(this.value);
            var cid = $(this).val();
            if (cid) {
                $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/districts/" + cid,
                    success: function(res) {
                        console.log(res);
                        if (res) {
                            $("#Huyenlop12").empty();

                            $("#Huyenlop12").append('<option>-Chọn Huyện/Quận-</option>');
                            $.each(res, function(key, value) {
                                $("#Huyenlop12").append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    }

                });
            }
        });
    </script>
    <script>
        var recaptcha_response = '';

        function submitUserForm() {
            if (recaptcha_response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
                return false;
            }
            return true;
        }

        function verifyCaptcha(token) {
            recaptcha_response = token;
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
</body>

</html>