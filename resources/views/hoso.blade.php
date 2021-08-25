<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<body>">
</head>

<body>
    @if(session('message'))
    <span>
        <strong>{{session('message')}}</strong>
    </span>
    @endif
    <table border="0" bgcolor="#CCFFFF" width="100%" cellpading="0" cellspacing="0">
        <tbody>
            <tr>
                <td width="40%" style="font-size: 24; color: #0000FF">&nbsp;&nbsp; Tạo Hồ sơ dự thi</td>
                <td align="right" style="font-size: 12;">Người dùng: &nbsp;<b>{{Auth::user()->email}}</b></td>
            </tr>
        </tbody>
    </table>
    <form action="{{route('hoso.store')}}" method="post">
        {{ csrf_field()}}
        <hr><input type="hidden" name="FnAnhhoso" value="">
        <script>
            document.cet_DangkyHS.FnAnhhoso.value = ""
        </script>
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
                            <td rowspan="5" align="right"><img id="ViewAnhhoso" src="data/Anhhoso/khunganh.png" style="height:150;width:115"></td>
                        </tr>
                        <tr height="32">
                            <td>1. Họ, chữ đệm và tên: </td>
                            <td colspan="2"><input type="text" name="name" size="30" style="height:28;width:100%;font-size: 12pt"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Giới tính: </td>
                            <td>Nam <input type="radio" name="gender" value="0" checked=""> Nữ<input type="radio" name="Gioitinh" value="1"></td>

                            <td></td>
                        </tr>
                        <tr height="32">
                            <td>3. Ngày sinh:</td>
                            <td><input type="Date" name="birthday" value="" title="Chọn ngày trong bảng. Nếu không được hỗ trợ chọn thì nhập : yyyy-mm-dd" placeholder="yyyy-mm-dd"></td>
                            <td>       4. Nơi sinh:</td>
                            <td><input type="text" name="place_of_birth" value=""></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Dân tộc:</td>
                            <td><select size="1" name="nation_type" style="height:27px;font-size:12pt">;<option value="0"> -Chọn dân tộc- </option>
                                    <option value="1">Kinh </option>
                                    <option value="2">Tày </option>
                                    <option value="3">Thái </option>
                                    <option value="4">Hoa </option>
                                    <option value="5">Khơ-me </option>
                                    <option value="6">Mường </option>
                                    <option value="7">Nùng </option>
                                    <option value="8">HMông </option>
                                    <option value="9">Dao </option>
                                    <option value="10">Gia-rai </option>
                                    <option value="11">Ngái </option>
                                    <option value="12">Ê-đê </option>
                                    <option value="13">Ba na </option>
                                    <option value="14">Xơ-Đăng </option>
                                    <option value="15">Sán Chay </option>
                                    <option value="16">Cơ-ho </option>
                                    <option value="17">Chăm </option>
                                    <option value="18">Sán Dìu </option>
                                    <option value="19">Hrê </option>
                                    <option value="20">Mnông </option>
                                    <option value="21">Ra-glai </option>
                                    <option value="22">Xtiêng </option>
                                    <option value="23">Bru-Vân Kiều </option>
                                    <option value="24">Thổ </option>
                                    <option value="25">Giáy </option>
                                    <option value="26">Cơ-tu </option>
                                    <option value="27">Gié Triêng </option>
                                    <option value="28">Mạ </option>
                                    <option value="29">Khơ-mú </option>
                                    <option value="30">Co </option>
                                    <option value="31">Tà-ôi </option>
                                    <option value="32">Chơ-ro </option>
                                    <option value="33">Kháng </option>
                                    <option value="34">Xinh-mun </option>
                                    <option value="35">Hà Nhì </option>
                                    <option value="36">Chu ru </option>
                                    <option value="37">Lào </option>
                                    <option value="38">La Chí </option>
                                    <option value="39">La Ha </option>
                                    <option value="40">Phù Lá </option>
                                    <option value="41">La Hủ </option>
                                    <option value="42">Lự </option>
                                    <option value="43">Lô Lô </option>
                                    <option value="44">Chứt </option>
                                    <option value="45">Mảng </option>
                                    <option value="46">Pà Thẻn </option>
                                    <option value="47">Co Lao </option>
                                    <option value="48">Cống </option>
                                    <option value="49">Bố Y </option>
                                    <option value="50">Si La </option>
                                    <option value="51">Pu Péo </option>
                                    <option value="52">Brâu </option>
                                    <option value="53">Ơ Đu </option>
                                    <option value="54">Rơ măm </option>
                                </select></td>

                        </tr>
                        <tr height="32">
                            <td>6. Số CMND/CCCD</td>
                            <td><input type="text" name="cmnd" size="15" value="" onchange="cet_SCMNNvalid();"></td>
                            <td>       7. Ngày cấp:</td>
                            <td><input type="Date" name="date_create_cmnd" value="" title="Chọn ngày trong bảng. Nếu không được hỗ trợ chọn thì nhập : yyyy-mm-dd" placeholder="yyyy-mm-dd"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8. Nơi cấp:</td>
                            <td><input type="text" name="place_create_cmnd" size="15" value=""></td>

                        </tr>
                        <tr height="32">
                            <td colspan="5">9. Hộ khẩu thường trú: &nbsp;Tỉnh/Tp:&nbsp;<select size="1" id="TinhTT" name="hk_tinh" style="font-size:11pt;height:27px;" onchange="bindingHuyen('TinhTT','HuyenTT',' ');">
                                    <option value="0"> -Chọn Tỉnh/Tp- </option>
                                    <option value="01">Thành phố Hà Nội </option>
                                    <option value="02">Thành phố Hồ Chí Minh </option>
                                    <option value="03">Thành phố Hải Phòng </option>
                                    <option value="04">Thành phố Đà Nẵng </option>
                                    <option value="05">Tỉnh Hà Giang </option>
                                    <option value="06">Tỉnh Cao Bằng </option>
                                    <option value="07">Tỉnh Lai Châu </option>
                                    <option value="08">Tỉnh Lào Cai </option>
                                    <option value="09">Tỉnh Tuyên Quang </option>
                                    <option value="10">Tỉnh Lạng Sơn </option>
                                    <option value="11">Tỉnh Bắc Kạn </option>
                                    <option value="12">Tỉnh Thái Nguyên </option>
                                    <option value="13">Tỉnh Yên Bái </option>
                                    <option value="14">Tỉnh Sơn La </option>
                                    <option value="15">Tỉnh Phú Thọ </option>
                                    <option value="16">Tỉnh Vĩnh Phúc </option>
                                    <option value="17">Tỉnh Quảng Ninh </option>
                                    <option value="18">Tỉnh Bắc Giang </option>
                                    <option value="19">Tỉnh Bắc Ninh </option>
                                    <option value="21">Tỉnh Hải Dương </option>
                                    <option value="22">Tỉnh Hưng Yên </option>
                                    <option value="23">Tỉnh Hòa Bình </option>
                                    <option value="24">Tỉnh Hà Nam </option>
                                    <option value="25">Tỉnh Nam Định </option>
                                    <option value="26">Tỉnh Thái Bình </option>
                                    <option value="27">Tỉnh Ninh Bình </option>
                                    <option value="28">Tỉnh Thanh Hóa </option>
                                    <option value="29">Tỉnh Nghệ An </option>
                                    <option value="30">Tỉnh Hà Tĩnh </option>
                                    <option value="31">Tỉnh Quảng Bình </option>
                                    <option value="32">Tỉnh Quảng Trị </option>
                                    <option value="33">Tỉnh Thừa Thiên -Huế </option>
                                    <option value="34">Tỉnh Quảng Nam </option>
                                    <option value="35">Tỉnh Quảng Ngãi </option>
                                    <option value="36">Tỉnh Kon Tum </option>
                                    <option value="37">Tỉnh Bình Định </option>
                                    <option value="38">Tỉnh Gia Lai </option>
                                    <option value="39">Tỉnh Phú Yên </option>
                                    <option value="40">Tỉnh Đắk Lắk </option>
                                    <option value="41">Tỉnh Khánh Hòa </option>
                                    <option value="42">Tỉnh Lâm Đồng </option>
                                    <option value="43">Tỉnh Bình Phước </option>
                                    <option value="44">Tỉnh Bình Dương </option>
                                    <option value="45">Tỉnh Ninh Thuận </option>
                                    <option value="46">Tỉnh Tây Ninh </option>
                                    <option value="47">Tỉnh Bình Thuận </option>
                                    <option value="48">Tỉnh Đồng Nai </option>
                                    <option value="49">Tỉnh Long An </option>
                                    <option value="50">Tỉnh Đồng Tháp </option>
                                    <option value="51">Tỉnh An Giang </option>
                                    <option value="52">Tỉnh Bà Rịa-Vũng Tàu </option>
                                    <option value="53">Tỉnh Tiền Giang </option>
                                    <option value="54">Tỉnh Kiên Giang </option>
                                    <option value="55">Thành Phố Cần Thơ </option>
                                    <option value="56">Tỉnh Bến Tre </option>
                                    <option value="57">Tỉnh Vĩnh Long </option>
                                    <option value="58">Tỉnh Trà Vinh </option>
                                    <option value="59">Tỉnh Sóc Trăng </option>
                                    <option value="60">Tỉnh Bạc Liêu </option>
                                    <option value="61">Tỉnh Cà Mau </option>
                                    <option value="62">Tỉnh Điện Biên </option>
                                    <option value="63">Tỉnh Đăk Nông </option>
                                    <option value="64">Tỉnh Hậu Giang </option>
                                </select> &nbsp; Huyện/Quận/Thị xã: &nbsp;

                                <select size="1" id="HuyenTT" name="hk_huyen" style="height:27px;font-size:11pt">
                                    <option selected="" value="0">-Chọn huyện-</option>
                                    <option value="10">Quận Bắc Từ Liêm</option>
                                    <option value="11">Huyện Thanh Trì</option>
                                    <option value="12">Huyện Gia Lâm</option>
                                    <option value="13">Huyện Đông Anh</option>
                                    <option value="14">Huyện Sóc Sơn</option>
                                    <option value="15">Quận Hà Đông</option>
                                    <option value="16">Thị xã Sơn Tây</option>
                                    <option value="17">Huyện Ba Vì</option>
                                    <option value="18">Huyện Phúc Thọ</option>
                                    <option value="19">Huyện Thạch Thất</option>
                                    <option value="20">Huyện Quốc Oai</option>
                                    <option value="21">Huyện Chương Mỹ</option>
                                    <option value="22">Huyện Đan Phượng</option>
                                    <option value="23">Huyện Hoài Đức</option>
                                    <option value="24">Huyện Thanh Oai</option>
                                    <option value="25">Huyện Mỹ Đức</option>
                                    <option value="26">Huyện Ứng Hòa</option>
                                    <option value="27">Huyện Thường Tín</option>
                                    <option value="28">Huyện Phú Xuyên</option>
                                    <option value="29">Huyện Mê Linh</option>
                                    <option value="30">Quận Nam Từ Liêm</option>
                                    <option value="31">Khác (NN, CA,QĐ)</option>
                                    <option value="01">Quận Ba Đình</option>
                                    <option value="02">Quận Hoàn Kiếm</option>
                                    <option value="03">Quận Hai Bà Trưng</option>
                                    <option value="04">Quận Đống Đa</option>
                                    <option value="05">Quận Tây Hồ</option>
                                    <option value="06">Quận Cầu Giấy</option>
                                    <option value="07">Quận Thanh Xuân</option>
                                    <option value="08">Quận Hoàng Mai</option>
                                    <option value="09">Quận Long Biên</option>
                                </select>
                                   10. Ảnh hồ sơ (*.jpg, tỷ lệ 4:6)
                            </td>
                            <td colspan="1"><input type="file" id="Anhhoso" name="avatar" accept="image/jpeg" data-type="image" onchange="ImagesFileAsURL()"></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div><br>
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
                            <td> Di động: &nbsp;<input type="text" name="phonenumber_dd" value="" style="height:28;width:60%;font-size: 12pt"></td>
                            <td colspan="2"> Điện thoại Cố định (<i>nếu có</i>) : &nbsp;<input type="text" name="phonenumber_cd" value="" style="height:28;width:45%;font-size: 12pt"></td>

                        </tr>
                        <tr height="32">
                            <td colspan="2">13. Gửi thông báo qua đường bưu điện cho :</td>
                            <td colspan="4"><input type="text" name="sent_notice_to_person" value="" style="height:28;width:100%;font-size: 12pt"></td>


                        </tr>
                        <tr height="32">
                            <td>14. Địa chỉ:</td>
                            <td colspan="5"><input type="text" name="sent_notice_to_address" value="" size="15" style="height:28;width:100%;font-size: 12pt"></td>


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
                            <td><select size="1" name="uu_tien_type" style="height:27px;font-size:12pt">;<option value="0"> -Không ưu tiên- </option>
                                    <option value="1">Ưu tiên 1 </option>
                                    <option value="2">Ưu tiên 2 </option>
                                    <option value="3">Ưu tiên 3 </option>
                                    <option value="4">Ưu tiên 4 </option>
                                    <option value="5">Ưu tiên 5 </option>
                                    <option value="6">Ưu tiên 6 </option>
                                    <option value="7">Ưu tiên 7 </option>
                                </select></td>
                            <td>  16. Khu vực</td>
                            <td><select size="1" name="uu_tien_place" style="height:27px;font-size:12pt">;<option value="0"> -Chọn khu vực- </option>
                                    <option value="1">Khu vực 1 </option>
                                    <option value="2">Khu vực 2 </option>
                                    <option value="2NT">Khu vực 2 nông thôn </option>
                                    <option value="3">Khu vực 3 </option>
                                </select> </td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr height="32">
                            <td colspan="6">17. Nơi học THPT hoặc tương đương</td>
                        </tr>
                        <tr height="32">
                            <td> Năm lớp 10 - Tỉnh/Thành phố:</td>
                            <td><select size="1" id="Tinhlop10" name="lop10_tinh" style="font-size:11pt;height:27px;" onchange="bindingHuyen('Tinhlop10','Huyenlop10','Truonglop10');">
                                    <option value="0"> -Chọn Tỉnh/Tp- </option>
                                    <option value="01">Thành phố Hà Nội </option>
                                    <option value="02">Thành phố Hồ Chí Minh </option>
                                    <option value="03">Thành phố Hải Phòng </option>
                                    <option value="04">Thành phố Đà Nẵng </option>
                                    <option value="05">Tỉnh Hà Giang </option>
                                    <option value="06">Tỉnh Cao Bằng </option>
                                    <option value="07">Tỉnh Lai Châu </option>
                                    <option value="08">Tỉnh Lào Cai </option>
                                    <option value="09">Tỉnh Tuyên Quang </option>
                                    <option value="10">Tỉnh Lạng Sơn </option>
                                    <option value="11">Tỉnh Bắc Kạn </option>
                                    <option value="12">Tỉnh Thái Nguyên </option>
                                    <option value="13">Tỉnh Yên Bái </option>
                                    <option value="14">Tỉnh Sơn La </option>
                                    <option value="15">Tỉnh Phú Thọ </option>
                                    <option value="16">Tỉnh Vĩnh Phúc </option>
                                    <option value="17">Tỉnh Quảng Ninh </option>
                                    <option value="18">Tỉnh Bắc Giang </option>
                                    <option value="19">Tỉnh Bắc Ninh </option>
                                    <option value="21">Tỉnh Hải Dương </option>
                                    <option value="22">Tỉnh Hưng Yên </option>
                                    <option value="23">Tỉnh Hòa Bình </option>
                                    <option value="24">Tỉnh Hà Nam </option>
                                    <option value="25">Tỉnh Nam Định </option>
                                    <option value="26">Tỉnh Thái Bình </option>
                                    <option value="27">Tỉnh Ninh Bình </option>
                                    <option value="28">Tỉnh Thanh Hóa </option>
                                    <option value="29">Tỉnh Nghệ An </option>
                                    <option value="30">Tỉnh Hà Tĩnh </option>
                                    <option value="31">Tỉnh Quảng Bình </option>
                                    <option value="32">Tỉnh Quảng Trị </option>
                                    <option value="33">Tỉnh Thừa Thiên -Huế </option>
                                    <option value="34">Tỉnh Quảng Nam </option>
                                    <option value="35">Tỉnh Quảng Ngãi </option>
                                    <option value="36">Tỉnh Kon Tum </option>
                                    <option value="37">Tỉnh Bình Định </option>
                                    <option value="38">Tỉnh Gia Lai </option>
                                    <option value="39">Tỉnh Phú Yên </option>
                                    <option value="40">Tỉnh Đắk Lắk </option>
                                    <option value="41">Tỉnh Khánh Hòa </option>
                                    <option value="42">Tỉnh Lâm Đồng </option>
                                    <option value="43">Tỉnh Bình Phước </option>
                                    <option value="44">Tỉnh Bình Dương </option>
                                    <option value="45">Tỉnh Ninh Thuận </option>
                                    <option value="46">Tỉnh Tây Ninh </option>
                                    <option value="47">Tỉnh Bình Thuận </option>
                                    <option value="48">Tỉnh Đồng Nai </option>
                                    <option value="49">Tỉnh Long An </option>
                                    <option value="50">Tỉnh Đồng Tháp </option>
                                    <option value="51">Tỉnh An Giang </option>
                                    <option value="52">Tỉnh Bà Rịa-Vũng Tàu </option>
                                    <option value="53">Tỉnh Tiền Giang </option>
                                    <option value="54">Tỉnh Kiên Giang </option>
                                    <option value="55">Thành Phố Cần Thơ </option>
                                    <option value="56">Tỉnh Bến Tre </option>
                                    <option value="57">Tỉnh Vĩnh Long </option>
                                    <option value="58">Tỉnh Trà Vinh </option>
                                    <option value="59">Tỉnh Sóc Trăng </option>
                                    <option value="60">Tỉnh Bạc Liêu </option>
                                    <option value="61">Tỉnh Cà Mau </option>
                                    <option value="62">Tỉnh Điện Biên </option>
                                    <option value="63">Tỉnh Đăk Nông </option>
                                    <option value="64">Tỉnh Hậu Giang </option>
                                </select></td>
                            <td> Quận/Huyện/Thị xã:</td>
                            <td><select size="1" id="Huyenlop10" name="lop10_huyen" style="font-size:11pt;height:27px;" onchange="bindingTruong('Tinhlop10','Huyenlop10','Truonglop10')">
                                    <option value="0"> ---------- </option>
                                </select></td>
                            <td> Trường THPT: </td>
                            <td colspan="1"><select size="1" id="Truonglop10" name="lop10_truong" style="height:27px;font-size:12pt" onchange="settinhhuyentruong1112();">
                                    <option value="0"> -Chọn trường- </option>
                                </select></td>
                        </tr>
                        <tr height="32">
                            <td> Năm lớp 11 - Tỉnh/Thành phố:</td>
                            <td><select size="1" id="Tinhlop11" name="lop11_tinh" style="font-size:11pt;height:27px;" onchange="bindingHuyen('Tinhlop11','Huyenlop11','Truonglop11');">
                                    <option value="0"> -Chọn Tỉnh/Tp- </option>
                                    <option value="01">Thành phố Hà Nội </option>
                                    <option value="02">Thành phố Hồ Chí Minh </option>
                                    <option value="03">Thành phố Hải Phòng </option>
                                    <option value="04">Thành phố Đà Nẵng </option>
                                    <option value="05">Tỉnh Hà Giang </option>
                                    <option value="06">Tỉnh Cao Bằng </option>
                                    <option value="07">Tỉnh Lai Châu </option>
                                    <option value="08">Tỉnh Lào Cai </option>
                                    <option value="09">Tỉnh Tuyên Quang </option>
                                    <option value="10">Tỉnh Lạng Sơn </option>
                                    <option value="11">Tỉnh Bắc Kạn </option>
                                    <option value="12">Tỉnh Thái Nguyên </option>
                                    <option value="13">Tỉnh Yên Bái </option>
                                    <option value="14">Tỉnh Sơn La </option>
                                    <option value="15">Tỉnh Phú Thọ </option>
                                    <option value="16">Tỉnh Vĩnh Phúc </option>
                                    <option value="17">Tỉnh Quảng Ninh </option>
                                    <option value="18">Tỉnh Bắc Giang </option>
                                    <option value="19">Tỉnh Bắc Ninh </option>
                                    <option value="21">Tỉnh Hải Dương </option>
                                    <option value="22">Tỉnh Hưng Yên </option>
                                    <option value="23">Tỉnh Hòa Bình </option>
                                    <option value="24">Tỉnh Hà Nam </option>
                                    <option value="25">Tỉnh Nam Định </option>
                                    <option value="26">Tỉnh Thái Bình </option>
                                    <option value="27">Tỉnh Ninh Bình </option>
                                    <option value="28">Tỉnh Thanh Hóa </option>
                                    <option value="29">Tỉnh Nghệ An </option>
                                    <option value="30">Tỉnh Hà Tĩnh </option>
                                    <option value="31">Tỉnh Quảng Bình </option>
                                    <option value="32">Tỉnh Quảng Trị </option>
                                    <option value="33">Tỉnh Thừa Thiên -Huế </option>
                                    <option value="34">Tỉnh Quảng Nam </option>
                                    <option value="35">Tỉnh Quảng Ngãi </option>
                                    <option value="36">Tỉnh Kon Tum </option>
                                    <option value="37">Tỉnh Bình Định </option>
                                    <option value="38">Tỉnh Gia Lai </option>
                                    <option value="39">Tỉnh Phú Yên </option>
                                    <option value="40">Tỉnh Đắk Lắk </option>
                                    <option value="41">Tỉnh Khánh Hòa </option>
                                    <option value="42">Tỉnh Lâm Đồng </option>
                                    <option value="43">Tỉnh Bình Phước </option>
                                    <option value="44">Tỉnh Bình Dương </option>
                                    <option value="45">Tỉnh Ninh Thuận </option>
                                    <option value="46">Tỉnh Tây Ninh </option>
                                    <option value="47">Tỉnh Bình Thuận </option>
                                    <option value="48">Tỉnh Đồng Nai </option>
                                    <option value="49">Tỉnh Long An </option>
                                    <option value="50">Tỉnh Đồng Tháp </option>
                                    <option value="51">Tỉnh An Giang </option>
                                    <option value="52">Tỉnh Bà Rịa-Vũng Tàu </option>
                                    <option value="53">Tỉnh Tiền Giang </option>
                                    <option value="54">Tỉnh Kiên Giang </option>
                                    <option value="55">Thành Phố Cần Thơ </option>
                                    <option value="56">Tỉnh Bến Tre </option>
                                    <option value="57">Tỉnh Vĩnh Long </option>
                                    <option value="58">Tỉnh Trà Vinh </option>
                                    <option value="59">Tỉnh Sóc Trăng </option>
                                    <option value="60">Tỉnh Bạc Liêu </option>
                                    <option value="61">Tỉnh Cà Mau </option>
                                    <option value="62">Tỉnh Điện Biên </option>
                                    <option value="63">Tỉnh Đăk Nông </option>
                                    <option value="64">Tỉnh Hậu Giang </option>
                                </select></td>
                            <td> Quận/Huyện/Thị xã:</td>
                            <td><select size="1" id="Huyenlop11" name="lop11_huyen" style="font-size:11pt;height:27px;" onchange="bindingTruong('Tinhlop11','Huyenlop11','Truonglop11')">
                                    <option value="0"> ---------- </option>
                                </select></td>
                            <td> Trường THPT: </td>
                            <td colspan="1"><select size="1" id="Truonglop11" name="lop11_truong" style="height:27px;font-size:12pt">;<option value="0"> -Chọn trường- </option></select></td>
                        </tr>
                        <tr height="32">
                            <td> Năm lớp 12 - Tỉnh/Thành phố:</td>
                            <td><select size="1" id="Tinhlop12" name="lop12_tinh" style="font-size:11pt;height:27px;" onchange="bindingHuyen('Tinhlop12','Huyenlop12','Truonglop12');">
                                    <option value="0"> -Chọn Tỉnh/Tp- </option>
                                    <option value="01">Thành phố Hà Nội </option>
                                    <option value="02">Thành phố Hồ Chí Minh </option>
                                    <option value="03">Thành phố Hải Phòng </option>
                                    <option value="04">Thành phố Đà Nẵng </option>
                                    <option value="05">Tỉnh Hà Giang </option>
                                    <option value="06">Tỉnh Cao Bằng </option>
                                    <option value="07">Tỉnh Lai Châu </option>
                                    <option value="08">Tỉnh Lào Cai </option>
                                    <option value="09">Tỉnh Tuyên Quang </option>
                                    <option value="10">Tỉnh Lạng Sơn </option>
                                    <option value="11">Tỉnh Bắc Kạn </option>
                                    <option value="12">Tỉnh Thái Nguyên </option>
                                    <option value="13">Tỉnh Yên Bái </option>
                                    <option value="14">Tỉnh Sơn La </option>
                                    <option value="15">Tỉnh Phú Thọ </option>
                                    <option value="16">Tỉnh Vĩnh Phúc </option>
                                    <option value="17">Tỉnh Quảng Ninh </option>
                                    <option value="18">Tỉnh Bắc Giang </option>
                                    <option value="19">Tỉnh Bắc Ninh </option>
                                    <option value="21">Tỉnh Hải Dương </option>
                                    <option value="22">Tỉnh Hưng Yên </option>
                                    <option value="23">Tỉnh Hòa Bình </option>
                                    <option value="24">Tỉnh Hà Nam </option>
                                    <option value="25">Tỉnh Nam Định </option>
                                    <option value="26">Tỉnh Thái Bình </option>
                                    <option value="27">Tỉnh Ninh Bình </option>
                                    <option value="28">Tỉnh Thanh Hóa </option>
                                    <option value="29">Tỉnh Nghệ An </option>
                                    <option value="30">Tỉnh Hà Tĩnh </option>
                                    <option value="31">Tỉnh Quảng Bình </option>
                                    <option value="32">Tỉnh Quảng Trị </option>
                                    <option value="33">Tỉnh Thừa Thiên -Huế </option>
                                    <option value="34">Tỉnh Quảng Nam </option>
                                    <option value="35">Tỉnh Quảng Ngãi </option>
                                    <option value="36">Tỉnh Kon Tum </option>
                                    <option value="37">Tỉnh Bình Định </option>
                                    <option value="38">Tỉnh Gia Lai </option>
                                    <option value="39">Tỉnh Phú Yên </option>
                                    <option value="40">Tỉnh Đắk Lắk </option>
                                    <option value="41">Tỉnh Khánh Hòa </option>
                                    <option value="42">Tỉnh Lâm Đồng </option>
                                    <option value="43">Tỉnh Bình Phước </option>
                                    <option value="44">Tỉnh Bình Dương </option>
                                    <option value="45">Tỉnh Ninh Thuận </option>
                                    <option value="46">Tỉnh Tây Ninh </option>
                                    <option value="47">Tỉnh Bình Thuận </option>
                                    <option value="48">Tỉnh Đồng Nai </option>
                                    <option value="49">Tỉnh Long An </option>
                                    <option value="50">Tỉnh Đồng Tháp </option>
                                    <option value="51">Tỉnh An Giang </option>
                                    <option value="52">Tỉnh Bà Rịa-Vũng Tàu </option>
                                    <option value="53">Tỉnh Tiền Giang </option>
                                    <option value="54">Tỉnh Kiên Giang </option>
                                    <option value="55">Thành Phố Cần Thơ </option>
                                    <option value="56">Tỉnh Bến Tre </option>
                                    <option value="57">Tỉnh Vĩnh Long </option>
                                    <option value="58">Tỉnh Trà Vinh </option>
                                    <option value="59">Tỉnh Sóc Trăng </option>
                                    <option value="60">Tỉnh Bạc Liêu </option>
                                    <option value="61">Tỉnh Cà Mau </option>
                                    <option value="62">Tỉnh Điện Biên </option>
                                    <option value="63">Tỉnh Đăk Nông </option>
                                    <option value="64">Tỉnh Hậu Giang </option>
                                </select></td>
                            <td> Quận/Huyện/Thị xã:</td>
                            <td><select size="1" id="Huyenlop12" name="lop12_huyen" style="font-size:11pt;height:27px;" onchange="bindingTruong('Tinhlop12','Huyenlop12','Truonglop12')">
                                    <option value="0"> ---------- </option>
                                </select></td>
                            <td> Trường THPT: </td>
                            <td colspan="1"><select size="1" id="Truonglop12" name="lop12_truong" style="height:27px;font-size:12pt">;<option value="0"> -Chọn trường- </option></select></td>
                        </tr>
                    </tbody>
                </table>18. Trung bình chung học tập:<table width="100%" border="1" cellpadding="0" cellspacing="0" style="font-family: Times New Roman; font-size: 12pt">
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
                                            <td align="center"><input type="text" name="lop10_diemki1" value="" style="text-align: center;height:28;width:80%;font-size: 12p" onchange="JavaScript:checkdiem(L10HK1,L10HK2,L10CN,1);"></td>
                                            <td align="center"><input type="text" name="lop10_diemki2" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(L10HK2,L10HK1,L10CN,2);"> </td>
                                            <td align="center"><input type="text" name="lop10_diemtong" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(L10CN);" readonly="readonly"></td>
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
                                            <td align="center"><input type="text" name="lop11_diemki1" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(L11HK1,L11HK2,L11CN,1);"></td>
                                            <td align="center"><input type="text" name="lop11_diemki2" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(L11HK2,L11HK1,L11CN,2);"> </td>
                                            <td align="center"><input type="text" name="lop11_diemtong" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(L11CN);" readonly="readonly"></td>
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
                                            <td align="center"><input type="text" name="lop12_diemki1" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(L12HK1,L12HK2,L12CN,1);"></td>
                                            <td align="center"><input type="text" name="lop12_diemki2" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(L12HK2,L12HK1,L12CN,2);"> </td>
                                            <td align="center"><input type="text" name="lop12_diemtong" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(L12CN);" readonly="readonly"></td>
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
                            <td colspan="9">19. Năm tốt nghiệp THPT (*): <input type="text" name="nam_totnghiep" value="" style="height:28;width:10%;font-size: 12pt"></td>
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
                            <td align="center"><input type="text" name="dToan" value="" style="text-align: center;height:28;width:80%;font-size: 12p" onchange="JavaScript:checkdiem(dToan);"></td>
                            <td align="center"><input type="text" name="dVan" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dVan);"> </td>
                            <td align="center"><input type="text" name="dNgoaiNgu" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dNgoaingu);"></td>

                            <td align="center"><input type="text" name="dLy" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dLy);"></td>
                            <td align="center"><input type="text" name="dHoa" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dHoa);"> </td>
                            <td align="center"><input type="text" name="dSinh" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dSinh);"></td>

                            <td align="center"><input type="text" name="dSu" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dSu);"></td>
                            <td align="center"><input type="text" name="dDia" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dDia);"> </td>
                            <td align="center"><input type="text" name="dGdcd" value="" style="text-align: center;height:28;width:80%;font-size: 12pt" onchange="JavaScript:checkdiem(dGDCD);"></td>

                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div><br>
        <table border="0">
            <tbody>
                <tr>
                    <td width="40%">
                        <div class="g-recaptcha" style="width: 100%;overflow: auto;" data-sitekey="6LebB44aAAAAAOwp4Oi_yXI0ZIP-wHg6odoJ2Sia">
                            <div style="width: 304px; height: 78px;">
                                <div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LebB44aAAAAAOwp4Oi_yXI0ZIP-wHg6odoJ2Sia&amp;co=aHR0cHM6Ly9raGFvdGhpLnZudS5lZHUudm46NDQz&amp;hl=vi&amp;v=eWmgPeIYKJsH2R2FrgakEIkq&amp;size=normal&amp;cb=8atgr2d3dn4z" width="304" height="78" role="presentation" name="a-avthbtjr7a4y" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                            </div><iframe style="display: none;"></iframe>
                        </div>
                    </td>
                    <td width="46%" align="center">
                        <button type="submit">
                            Ghi nhận
                        </button>
                        <input name="Send" type="hidden" value=""><a href="#" class="button" ;font-size:="" 12pt;font-weight:bold;"="">Quay lại</a>&nbsp;<a href="#" class="button">Đăng ký đợt thi</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <div id="lbdictex_find_popup" class="lbexpopup hidden" style="position: absolute; top: 0px; left: 0px;">
        <div class="lbexpopup_top">
            <h2 class="fl popup_title">&nbsp;</h2>
            <ul>
                <li><a class="close_main popup_close" href="#">&nbsp;</a></li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="popup_details"></div>
        <!-- <div class="popup_powered">abc</div> -->
    </div>
    <div id="lbdictex_ask_mark" class="hidden" style="position: absolute; top: 0px; left: 0px;"><a class="lbdictex_ask_select" href="#">&nbsp;</a></div>
    <div style="background-color: rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow: rgba(0, 0, 0, 0.2) 2px 2px 3px; position: absolute; transition: visibility 0s linear 0.3s, opacity 0.3s linear 0s; opacity: 0; visibility: hidden; z-index: 2000000000; left: 0px; top: -10000px;">
        <div style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: rgb(255, 255, 255); opacity: 0.05;"></div>
        <div class="g-recaptcha-bubble-arrow" style="border: 11px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -11px; z-index: 2000000000;"></div>
        <div class="g-recaptcha-bubble-arrow" style="border: 10px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -10px; z-index: 2000000000;"></div>
        <div style="z-index: 2000000000; position: relative;"><iframe title="thử thách xác thực recaptcha" src="https://www.google.com/recaptcha/api2/bframe?hl=vi&amp;v=eWmgPeIYKJsH2R2FrgakEIkq&amp;k=6LebB44aAAAAAOwp4Oi_yXI0ZIP-wHg6odoJ2Sia&amp;cb=jpuqctpj3d68" name="c-avthbtjr7a4y" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox" style="width: 100%; height: 100%;"></iframe></div>
    </div>
</body>, initial-scale=1.0">
<title>Document</title>



</body>

</html>