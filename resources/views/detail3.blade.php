@extends('layout')
 

@section('content')
<body>
       
        
    <div class="main" style="overflow: visible;">
            <div class="left" style="font-size: 20px;">

            <div style="  margin-left: 100px;">
                    <h2> I. Thông tin cá nhân </h2>

                    <p> <b>Họ tên thí sinh: </b>{{$hoso->name}} </p>
                    <p> <b>Giới tính: </b>{{$hoso->gender}} </p>
                    <p> <b>Ngày sinh: </b>{{$hoso->birthday}} </p>
                    <p> <b>Số CMND/CCCD/Hộ chiếu: </b>{{$hoso->cmnd}} </p>
                    <p> <b>Hộ khẩu thường trú: </b>{{$hoso->hk_huyen}}, {{$hoso->hk_tinh}} </p>
                        
                    <h2> II. Thông tin dự thi </h2>
                    @foreach($hosoduthi as $hsdt)
                    <p><b>Số báo danh:  </b></p>
                    <p><b>Địa điểm dự thi:  </b>{{$hsdt->diemthi_diachi}} </p>
                    <p><b>Tên kì thi:  </b>{{$hsdt->dotthi_name}} </p>
                    <p><b>Thời gian: </b>{{$hsdt->ngay_bat_dau}} đến {{$hsdt->ngay_ket_thuc}}</p>
                    <p><b>Môn thi: </b>{{$hsdt->baithi_name}} </p>
                    <p><b>Ca thi: </b>{{$hsdt->cathi_name}} </p>
                    <p><b>Phòng thi: </b>{{$hsdt->diemthi_name}}</p>
                    
                    
                    <br/>
                    @endforeach
                </div>
            </div>
            <div class="right" style="    padding-top: 100px">
                <div class="avatar">
                    <h2 style = "color: #black;">
                        Ảnh hồ sơ
                    </h2>
                    <img src=  "{{asset('uploads/avatar.jpg')}}"
                    height="180px" width="150px"> 
                </div>

                <div class="QR">
                    <img src=  "{{asset('uploads/qr.png')}}"
                        height="180px" width="180px"> 
                </div>  

            </div>

    </div>


</body>
@endsection
