@extends('layout')
@section('content')

<body>

    <div class="banner">
        <div class="slogan">
            <h1>WELLCOME TO CET</h1>
            <h2>Chào mừng bạn đến với Cổng thông tin khảo thí DHQGHN</h2>
        </div>

        <!-- carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="anh1" src="{{ asset('uploads/sl1.jpg') }}" alt="" width="100%" height="100%" style="height:700px;width:1900px;">
                </div>
                <div class="carousel-item">
                    <img class="anh1" src="{{ asset('uploads/sl2.jpg') }}" alt="" width="100%" height="100%" style="height:700px;width:1900px;">
                </div>
                <div class="carousel-item">
                    <img class="anh1" src="{{ asset('uploads/sl3.jpg') }}" alt="" width="100%" height="100%" style="height:700px;width:1900px;">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- <div class="banner_logo">
            <img class="anh1" src="{{ asset('uploads/sl1.jpg') }}" alt="" width="100%" height="100%" style="height:700px;width:1900px;">
        </div> -->

    </div>
    <div class="home-main">
        <div class="home-left">
            <div class="home-trangchu__linkbar">
                <a href="#">
                    <h10>Trang chủ</10>
                </a>
                <h10>
                    Các đợt thi
                </h10>
            </div>
            <div class="dotthi">
                <a href="#">
                    <img src="{{ asset('uploads/Untitled-2.png') }}" alt="width=" 100%" height="100%">
                </a>
                <div class="tieude">
                    <li>
                        <a href="#">
                            ĐGNL học sinh THPT - ĐỢT 1 năm 2021
                        </a>
                    </li>
                    <h4>Đợt thi thứ 3 của kỳ thi Đánh giá năng lực học sinh trung học phổ thông năm 2021</h4>
                    <h5>Hạn đăng ký:2021-05-22</h5>
                </div>

            </div>
            <div class="dotthi">
                <a href="#">
                    <img src="{{ asset('uploads/Untitled-2.png') }}" alt="width=" 100%" height="100%">
                </a>


                <div class="tieude">
                    <li>
                        <a href="#">
                            ĐGNL học sinh THPT - ĐỢT 2 năm 2021
                        </a>
                    </li>
                    <h4>Đợt thi thứ 3 của kỳ thi Đánh giá năng lực học sinh trung học phổ thông năm 2021</h4>
                    <h5>Hạn đăng ký:2021-05-22</h5>
                </div>
            </div>
            <div class="dotthi">

                <a href="#">
                    <img src="{{ asset('uploads/Untitled-2.png') }}" alt="width=" 100%" height="100%">
                </a>


                <div class="tieude">
                    <li>
                        <a href="#">
                            ĐGNL học sinh THPT - ĐỢT 3 năm 2021
                        </a>
                    </li>
                    <h4>Đợt thi thứ 3 của kỳ thi Đánh giá năng lực học sinh trung học phổ thông năm 2021</h4>
                    <h5>Hạn đăng ký:2021-05-22</h5>
                </div>
            </div>

            <button>Xem Thêm</button>

        </div>
        <div class="home-right">
            <div class="home-right--bao__title">
                <h9>
                    Tin Tức
                </h9>
            </div>

            <div class="home-bao">
                <!-- <button><a href="#">Mới Nhất</a></button>
                <button><a href="#">Nổi Bật<table></table></a></button> -->
                <div class="home-bao--child">
                    <a class="img0" href="https://moet.gov.vn/tintuc/Pages/tin-tong-hop.aspx?ItemID=7488">
                        <img src="https://moet.gov.vn/content/tintuc/PublishingImages/ttxvn_hoc_sinh_01.jpg?RenditionID=13" width="100%" height="100%">
                    </a>
                    <div class="f1">
                        <h2><a href="/tintuc/Pages/tin-tong-hop.aspx?ItemID=7488" title="Ban hành Thông tư đánh giá học sinh trung học theo CT GDPT 2018">
                                Ban hành Thông tư đánh giá học sinh trung học theo CT GDPT 2018
                            </a></h2>
                    </div>
                </div>
                <div class="home-bao--child">
                    <a class="img0" href="https://moet.gov.vn/tintuc/Pages/tin-tong-hop.aspx?ItemID=7488">
                        <img src="https://moet.gov.vn/content/tintuc/PublishingImages/tk%20sgk-607411.jpg?RenditionID=13" width="100%" height="100%">
                    </a>
                    <div class="f1">
                        <h2><a href="/tintuc/Pages/tin-tong-hop.aspx?ItemID=7488" title="Ban hành Thông tư đánh giá học sinh trung học theo CT GDPT 2018">

                                Tổng kết 1 năm triển khai CTGDPT 2018: Kiên định mục tiêu đổi mới
                            </a></h2>
                    </div>
                </div>
                <div class="home-bao--child">
                    <a class="img0" href="https://moet.gov.vn/tintuc/Pages/tin-tong-hop.aspx?ItemID=7488">
                        <img src="https://moet.gov.vn/content/tintuc/PublishingImages/tong%20ket%20giao%20duc%20mam%20non-6622.jpg?RenditionID=13" width="100%" height="100%">
                    </a>
                    <div class="f1">
                        <h2><a href="/tintuc/Pages/tin-tong-hop.aspx?ItemID=7488" title="Ban hành Thông tư đánh giá học sinh trung học theo CT GDPT 2018">

                                Giáo dục mầm non năm học mới: Phấn đấu ba chữ “Yên”
                            </a></h2>
                    </div>
                </div>
                <div class="home-bao--child">
                    <a class="img0" href="https://moet.gov.vn/tintuc/Pages/tin-tong-hop.aspx?ItemID=7488">
                        <img src="https://moet.gov.vn/content/tintuc/PublishingImages/tuyen-sinh-4.jpg?RenditionID=13" width="100%" height="100%">
                    </a>
                    <div class="f1">
                        <h2><a href="/tintuc/Pages/tin-tong-hop.aspx?ItemID=7488" title="Ban hành Thông tư đánh giá học sinh trung học theo CT GDPT 2018">

                                Những hướng dẫn quan trọng đảm bảo tuyển sinh nghiêm túc, an toàn
                            </a></h2>
                    </div>
                </div>
                <div class="home-bao--child">
                    <a class="img0" href="https://moet.gov.vn/tintuc/Pages/tin-tong-hop.aspx?ItemID=7488">
                        <img src="https://moet.gov.vn/content/tintuc/PublishingImages/ti%E1%BA%BFp%20nh%E1%BA%ADn%20h%E1%BB%8Dc%20sinh.jpg?RenditionID=13" width="100%" height="100%">
                    </a>
                    <div class="f1">
                        <h2><a href="/tintuc/Pages/tin-tong-hop.aspx?ItemID=7488" title="Ban hành Thông tư đánh giá học sinh trung học theo CT GDPT 2018">
                                Bộ GDĐT đề nghị địa phương tiếp nhận học sinh từ vùng dịch về quê học tập
                            </a></h2>
                    </div>
                </div>

            </div>
            <div>

            </div>
        </div>

    </div>


</body>
@endsection