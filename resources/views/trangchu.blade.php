<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="top">
        <div class="login">
            <div class="left">
                <Li>khaothi@vnu.edu.vn</Li>
                <Li> (+84) – 24.66759258 / (+84) – 24.62532740</Li>
            </div>
            
             <div class="right">
               @if(Auth::check())
                <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">  {{Auth::user()->email}}
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">thông tin cá nhân</a></li>
                        <li><a href="#">đổi mật khẩu</a></li>
                        <li><a href="{{route('auth.logout')}}">Log out</a></li>
                    </ul>
                    </div>
                  
               @else 
                <a href="{{route('auth.show')}}">Đăng Kí</a>
                <a href="{{route('login')}}">Đăng Nhập</a>
                @endif
             </div>   
        </div>
        <div class="search">
            <div class="left">
              
                <a href="#">
                    
                    <img src="{{ asset('uploads/logohome.png') }}" alt="" width="100%"
                        height="100%" style="max-height:70px;max-width:140px;">
                </a>
              
            </div>

            <div class="right">
                <input type="text" placeholder="Từ khóa cần tìm..." style="background-color: white">
                <button type="button">tìm kiếm</button>
            </div>

        </div>
        <div class="menu">
            <div>
                <ul>
                    <li class="hop_xuong"><a href="#">#</a></li>
                    <li class="hop_xuong"><a href="#" class="noi_dung_xuong">Giới Thiệu</a>
                        <div class="noi_dung_con">
                            <a href="#"> Giới Thiệu</a>
                            <a href="#">Quy Chế</a>
                            <a href="#">Thoả Thuận</a>
                            <a href="#">Giới Thiệu Chức Năng</a>
        
                    </div></li>
                    <li class="hop_xuong"><a href="#" class="noi_dung_xuong">Thông Báo </a>
                        <div class="noi_dung_con">
                            <a href="#"> Tin Tức</a>
                            <a href="#">Đợt Thi</a>
        
                    </div></li>
                    <li class="hop_xuong"><a href="#" class="noi_dung_xuong">Đăng Kí Thi</a>
                        <div class="noi_dung_con">
                            <a href="#">Bài Thi Tham Khảo</a>
                            <a href="#">Đăng Kí Thi</a>
                            <a href="#">Sửa Đăng Kí Thi</a>
        
                    </div></li>
                    <li class="hop_xuong"><a href="#" class="noi_dung_xuong">Hồ Sơ Thí Sinh</a>
                        <div class="noi_dung_con">
                            <a href="#">Nhập Hồ Sơ</a>
                            <a href="#">Cập Nhật Hồ Sơ</a>
        
                    </div></li>
                    <li class="hop_xuong"><a href="#" class="noi_dung_xuong">Diễn Đàn</a>
                        <div class="noi_dung_con">
                            <a href="#"> Trao Đổi Chung</a>
                            <a href="#">Trao Đổi Riêng</a>
        
                    </div></li>
                    <li class="hop_xuong"><a href="#" class="noi_dung_xuong">Tra Cứu</a>
                        <div class="noi_dung_con">
                            <a href="#"> Kỳ Thi Đã Đăng Kí</a>
                            <a href="#">Xác Nhận Kì Thi</a>
                            <a href="#">Xác Nhận Điểm Thi</a>
        
                    </div></li>
                    <li class="hop_xuong">
                        <a href="#" class="noi_dung_xuong">Phí Đăng Kí </a>
                        <div class="noi_dung_con">
                                <a href="#">Phí Đăng Kí Dự Thi</a>
                                <a href="#">Phí Khác</a>
            
                        </div>
                    </li>
                </ul>

            </div>

        </div>
        <div class="banner">
            <div class="slogan">
                <h1>WELLCOME TO CET</h1>
                <h2>Chào mừng bạn đến với Cổng thông tin khảo thí DHQGHN</h2>
            </div>
            <div class="banner_logo">
                <img class="anh1" src="{{ asset('uploads/sl1.jpg') }}"
                    alt="" width="100%" height="100%" style="height:700px;width:1900px;">
            </div>


        </div>
    </div>
        <div class="main">
            <div class="left">
                <div class="trangchu">
                    <a href="#">
                        <h10>Trang chủ</10>
                    </a>
                    <h10>
                        Các đợt thi
                    </h10>
                </div>
                <div class="dotthi">
                    
                
                            <a href="#">
                                <img src="C:\Users\MSI gaming\Desktop\viewweb\home\banner\Untitled-2.png" alt="width=" 100%"
                                    height="100%">
                            </a>
                       
    
                        <div class="tieude">
                            <a href="#" >
                                <h3>ĐGNL học sinh THPT - ĐỢT 3 năm 2021</h3>
                            </a>
                            <h4>Đợt thi thứ 3 của kỳ thi Đánh giá năng lực học sinh trung học phổ thông năm 2021</h4>
                            <h5>Hạn đăng ký:2021-05-22</h5>
                        </div>
                          

    
                   
                </div>
                <div class="dotthi">
                   
                        
                            <a href="#">
                                <img src="C:\Users\MSI gaming\Desktop\viewweb\home\banner\Untitled-2.png" alt="width=" 100%"
                                    height="100%">
                            </a>
                        
    
                            <div class="tieude">
                                <a href="#" >
                                    <h3>ĐGNL học sinh THPT - ĐỢT 3 năm 2021</h3>
                                </a>
                                <h4>Đợt thi thứ 3 của kỳ thi Đánh giá năng lực học sinh trung học phổ thông năm 2021</h4>
                                <h5>Hạn đăng ký:2021-05-22</h5>
                            </div>
    
                   
                </div>
                <div class="dotthi">
                       
                            <a href="#">
                                <img src="C:\Users\MSI gaming\Desktop\viewweb\home\banner\Untitled-2.png" alt="width=" 100%"
                                    height="100%">
                            </a>
                      
    
                            <div class="tieude">
                                <a href="#" >
                                    <h3>ĐGNL học sinh THPT - ĐỢT 3 năm 2021</h3>
                                </a>
                                <h4>Đợt thi thứ 3 của kỳ thi Đánh giá năng lực học sinh trung học phổ thông năm 2021</h4>
                                <h5>Hạn đăng ký:2021-05-22</h5>
                            </div>
            
                </div>
            </div>
            <div class="right">
                <div>
                    <h9>
                        Tin Tức 
                    </h9>
                </div>
                <div class="tintuc">
                    <a href="#"></a>
                </div>
                <div>

                </div>
            </div>
           
        </div>
    <div id="footer">
        <footer class="footer-section" id="footerid">
            <div class="container">
                <div class="row">
                    <div class="tt1">
                        <div class="footer-widget">
                            <h5>Thông tin liên hệ</h5>
                        </div>
                        <div class="footer-left">
                            <ul>
                                <li><i class="fa fa-map-marker"></i> Địa chỉ:Tầng 8, Tòa nhà C1T, 144 Xuân Thủy, Cầu Giấy, Hà Nội.</li>
                                <li><i class="fa fa-phone"></i> Số điện thoại:(+84)-24.66759.258 / (+84)-24.62532.740</li>
                                <li><i class="fa fa-envelope"></i> Email:khaothi@vnu.edu.vn</li>
                            </ul>
                        </div>
                    </div>
                    <div class="tt2">
                        <div class="footer-widget">
                            <h5>Chính sách</h5>
                            <ul>
                                <li><a>Chính sách 1</a></li>
                                <li><a>Chính sách 2</a></li>
                                <li><a>Chính sách 3</a></li>
                                <li><a>Chính sách 4</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tt3">
                        <div class="footer-widget">
                            <h5>Hỗ trợ</h5>
                            <ul>
                                <li><a>Hỗ trợ 1</a></li>
                                <li><a>Hỗ trợ 2</a></li>
                                <li><a>Hỗ trợ 3</a></li>
                                <li><a>Hỗ trợ 4</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-reserved">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="copyright-text">
                                @2021  Trung tâm khảo thí ĐHQGHN
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>