<!DOCTYPE html>
<html>

<head>
    <title>dang ki thi</title>
    <link href="{{asset('/css/dangkithi.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
    @if(session('message'))
        <span>
        <strong>{{session('message')}}</strong>
        </span>
    @endif
    <table border="0" bgcolor="#00CCFF" width="100%" cellpading="1" cellspacing="1">
        <tbody>
            <tr>
            <td width="40%" rowspan="2" style="font-size: 24pt; color: #0000FF">&nbsp; Đăng ký Đợt thi</td>
                <td width="30%">&nbsp;&nbsp;&nbsp;</td>
                <td width="30%">&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
            <td width="30%" align="right"></td>
            <td width="30%" align="right"><i> Đăng nhập:Nguyễn Văn Nhất(nhatnguyenvan00001@gmail.com) </i></td>
            </tr>
        </tbody>
    </table>
    <div class="dangki">
        <table>
            <tr height="">
                <td td="" width="55%">
                    Đợt thi Tôi đã đăng ký<input type="radio" name="ckLoaikythi" value="1" checked="">
                    - Đợt thi mới mở: <input type="radio" name="ckLoaikythi" value="2" >
                    - Tất cả Đợt thi: 
                    <input type="radio" name="ckLoaikythiall" value="3" onclick="ckdotthiAll()"></td>
                <td width="20%"><small><i>(Số Đợt thi:[0] - bạn chưa đăng ký đơt thi nào)</i></small>
                </td>
                <td width="5%">Trang: </td>
                <td width="4%"><input type="text" value="1" name="page" style="width:100%"></td>
                <td width="2%"><input type="submit" value=">" name="next" style="width:100%"></td>
                <td width="2%"><input type="submit" value=">>" name="next" style="width:100%"></td>
                <td width="2%"><input type="submit" value="<" name="next" style="width:100%" disabled=""></td>
                <td width="2%"><input type="submit" value="<<" name="next" style="width:100%" disabled=""></td>
                <td width="1%">/</td>
                <td><input type="text" name="Page_total" value="0" style="width:85%" readonly="readonly"></td>
            </tr>
        </table>
    </div>
    <div class="bang">
        <table  width="100%" border="1px" ; cellpading="0" cellspacing="0">
           <thead>
                <tr height="40px">
                    <th width="60px"><b>STT</b></th>
                    <th width="90px"><b>Mã Đợt thi</b></th>
                    <th width="400px"><b>Tên Đợt thi</b></th>
                    <th width="110px"><b>Ngày bắt đầu</b></th>
                    <th width="110px"><b>Ngày kết thúc</b></th>
                    <th width="110px"><b>Hạn đăng ký</b></th>
                    <th width="90px"><b>Trạng thái</b></th>
                </tr>
 	</thead>
	 <tbody class="t-bang">
                @foreach( $dotthis as $dotthi)
                <tr>
                    <td>{{$dotthi->id}}</td>
                    <td>
                        <a  id="stt{{$dotthi->ma}}"  name="Chitiet1"  
                        style="width:100%;height:26" title="Nhấn để đăng ký" href="http://127.0.0.1:8000/Khaothi/CNdangkithi/{{$dotthi->id}}">
                        {{$dotthi->ma}}
                        </a>
                    </td>
                    <td>&nbsp;{{$dotthi->name}}</td>
                    <td>{{$dotthi->ngay_bat_dau}}</td>
                    <td>{{$dotthi->ngay_ket_thuc}}</td>
                    <td>{{$dotthi->han_dang_ki}}</td>
                    <td>{{$dotthi->status}}</td>
                </tr>
                @endforeach

             
            </tbody>
        </table>

    </div>

    <br>

    <!-- thong tin dot thi -->
    
    @yield('content')


    <div class="xacnhan">
        <td width="46%">
              
            <a href="{{route('home')}}">
                <input name="Send" type="button" value="Về trang chủ"
                    style="height:27px;font-size:12pt;font-weight:bold;width:120pt" class="button2">
            </a>
            <input name="Send" type="button" id="quaylai" value="Quay lại"
                style="height:27px;font-size:12pt;font-weight:bold;width:120pt" class="button2">
        </td>
    </div>

<script>

function ckdotthiAll(){
    window.location.href='{{route('dangkithi.show')}}';
}
</script>
</body>


</html>