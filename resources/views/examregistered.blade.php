@extends('layout')
 

@section('content')
<body>
       
        
    <div class="main">
            <div class="left">

            <table style="width:100%" cellspacing="0" cellpadding="0">
                <tr style="    border-bottom: 1px solid #E5E5E5;">
                    <th  width="15%">Tên thí sinh</th>
                    <th  width="55%">Tên đợt thi</th>
                    <th width="15%">Điểm</th>
                    <th  width="15%">Thực hiện</th>
                </tr>
                
                @foreach( $dotthis as $dotthi)
                <tr>
                    <td>{{Auth::user()->name}}</td>
                    <td>{{$dotthi->name}}</td>
                    <td>Chưa có điểm</td>
                    <td><a href="http://127.0.0.1:8000/tracuu1/{{$dotthi->id}}">Thông tin chi tiết</a></td>
                </tr>
                @endforeach

                
            </table>
            </div>
            
            
            <div class="right">
                <div>
                    <h9 style = "color: #5cb85c;">
                        Trang liên kết
                    </h9>
                </div>

                <div class="bao">
                    

                    <div class="bao-imgs">
                        <img src="{{ asset('uploads/find.png') }}" alt=""width="100px"
                            height="100px">
                    </div>


                    <div class="bao-tieude">
                        <li>
                            <a href="http://thisinh.thithptquocgia.edu.vn/Account/Login?ReturnUrl=%2f">
                                TRA CỨU THÔNG TIN DỰ THI
                            </a>
                        </li>
                        <h4>kết thúc học phần chung</h4>
                       
                    </div>
                
                </div>

                <div class="bao">
                    

                    <div class="bao-imgs">
                        <img src="{{ asset('uploads/find.png') }}" alt="" width="100px"
                            height="100px">
                    </div>


                    <div class="bao-tieude">
                        <li>
                            <a href="#">
                            TRA CỨU MÃ ĐĂNG KÍ DỰ THI
                            </a>
                        </li>
                        <h4>Kiểm tra kiến thức THPT</h4>
                      
                    </div>
                
                </div>

                <div class="bao">
                    

                    <div class="bao-imgs">
                        <img src="{{ asset('uploads/find.png') }}" alt="" width="100px"
                            height="100px">
                    </div>


                    <div class="bao-tieude">
                        <li>
                            <a href="#">
                            KHẢO SÁT Ý KIẾN SINH VIÊN
                            </a>
                        </li>
                        <h4> </h4>
                      
                    </div>
                
                </div>
            </div>

    </div>


</body>
@endsection
