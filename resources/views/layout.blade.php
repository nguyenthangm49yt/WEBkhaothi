
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang chủ</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    
     
   
</head>

<body>
    <div class="top">
        <div class="login">
            <div class="left">
                <li>khaothi@vnu.edu.vn</li>
                <li> (+84) – 24.66759258 / (+84) – 24.62532740</li>
            </div>
            <div class="right">
                @if(Auth::check())

                    
                        <div class="dropdown">
                            <button onclick="myFunction()" class="dropbtn">{{Auth::user()->email}}</button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="#">thông tin cá nhân</a>
                                <a href="#">đổi mật khẩu</a>
                                <a href="{{route('auth.logout')}}">Log out</a>
                            </div>
                        </div>
                @else 
                    <a href="{{route('auth.show')}}">Đăng Kí</a>
                    <a href="{{route('login')}}">Đăng Nhập</a>
                @endif
            </div>
        </div>
        <div class="search">
            <div class="left">
                <a href="{{route('home')}}">
                    <img src="{{ asset('uploads/logohome.png') }}" alt="" width="100%"
                        height="100%" style="max-height:70px;max-width:140px;">
                </a>
            </div>

            <div class="right">
                <input type="text" placeholder="Từ khóa cần tìm..." style="background-color: white">
                <button>tìm kiếm</button>
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

                        </div>
                    </li>
                    <li class="hop_xuong"><a href="#" class="noi_dung_xuong">Thông Báo </a>
                        <div class="noi_dung_con">
                            <a href="#"> Tin Tức</a>
                            <a href="#">Đợt Thi</a>

                        </div>
                    </li>
                    <li class="hop_xuong"><a href="#" class="noi_dung_xuong">Đăng Kí Thi</a>
                        <div class="noi_dung_con">
                            <a href="#">Bài Thi Tham Khảo</a>
                            <a href="{{route('dangkithi.show')}}">Đăng Kí Thi</a>
                            <a href="{{route('dangkithi.updateshow')}}">Sửa Đăng Kí Thi</a>

                        </div>
                    </li>
                    <li class="hop_xuong"><a href="#" class="noi_dung_xuong">Hồ Sơ Thí Sinh</a>
                        <div class="noi_dung_con">
                            <a href="{{route('hoso.show')}}">Nhập Hồ Sơ</a>
                            <a href="{{route('hoso.updateshow')}}">Cập Nhật Hồ Sơ</a>

                        </div>
                    </li>
                    <li class="hop_xuong"><a href="#" class="noi_dung_xuong">Diễn Đàn</a>
                        <div class="noi_dung_con">
                            <a href="#"> Trao Đổi Chung</a>
                            <a href="#">Trao Đổi Riêng</a>

                        </div>
                    </li>
                    <li class="hop_xuong"><a href="#" class="noi_dung_xuong">Tra Cứu</a>
                        <div class="noi_dung_con">
                            <a href="{{route('Tracuu.showlist')}}"> Kỳ Thi Đã Đăng Kí</a>
                            <a href="#">Xác Nhận Kì Thi</a>
                            <a href="#">Xác Nhận Điểm Thi</a>

                        </div>
                    </li>
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

    </div>
        <!-- NỘI DUNG TRANG -->
        
        @yield('content')


    <footer class="footer-section" id="footerid">
        <div class="container">
            <div>
                <img src="{{ asset('uploads/logohome.png') }}" alt="" width="100%"
                    height="100%">
            </div>
            <div class="tt1">
                <div class="left">
                    <h6>Thông tin liên hệ</h6>
                    <ul>

                        <li><i class="fa fa-map-marker"></i> Địa chỉ:Tầng 8, Tòa nhà C1T, 144 Xuân Thủy, Cầu Giấy,
                            Hà Nội.</li>
                        <li><i class="fa fa-phone"></i> Số điện thoại:(+84)-24.66759.258 / (+84)-24.62532.740</li>
                        <li><i class="fa fa-envelope"></i> Email:khaothi@vnu.edu.vn</li>
                    </ul>
                </div>
            </div>
            <div class="tt2">
                <div class="widget">
                    <h6>Chính sách</h6>
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
                    <h6>Hỗ trợ</h6>
                    <ul>
                        <li><a>Hỗ trợ 1</a></li>
                        <li><a>Hỗ trợ 2</a></li>
                        <li><a>Hỗ trợ 3</a></li>
                        <li><a>Hỗ trợ 4</a></li>
                    </ul>
                </div>
            </div>
            <div class="end">
                @2021 Trung tâm khảo thí
            </div>
        </div>
    </footer>

    <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>

</html>