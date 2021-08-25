@extends('layout')


@section('content')

<body>

    <div class="detail3-container" id="detail3-container" style="overflow: visible;">
        <div class="left" style="font-size: 20px;">

            <div style="margin-left: 50px;">
                <h2> I. Thông tin cá nhân </h2>

                <p> <b>Họ tên thí sinh: </b>{{$hoso->name}} </p>
                <p> <b>Giới tính: </b>{{($hoso->gender? "Nam" : "Nữ")}} </p>
                <p> <b>Ngày sinh: </b>{{$hoso->birthday}} </p>
                <p> <b>Số CMND/CCCD/Hộ chiếu: </b>{{$hoso->cmnd}} </p>
                <p> <b>Hộ khẩu thường trú: </b>{{$hoso_hk_huyen->name}}, {{$hoso_hk_tinh->name}} </p>

                <h2> II. Thông tin dự thi </h2>
                @foreach($hosoduthi as $hsdt)
                <p><b>Số báo danh: </b></p>
                <p><b>Địa điểm dự thi: </b>{{$hsdt->diemthi_diachi}} </p>
                <p><b>Tên kì thi: </b>{{$hsdt->dotthi_name}} </p>
                <p><b>Thời gian: </b>{{$hsdt->ngay_bat_dau}} đến {{$hsdt->ngay_ket_thuc}}</p>
                <p><b>Môn thi: </b>{{$hsdt->baithi_name}} </p>
                <p><b>Ca thi: </b>{{$hsdt->cathi_name}} </p>
                <p><b>Phòng thi: </b>{{$hsdt->diemthi_name}}</p>


                <br />
                @endforeach

                <div class="printer">
                    <button class="btn-printer" id="btn-printer" title="print to pdf"
                    onclick="demoFromHTML()"
                    >
                    </button>

                </div>
            </div>
        </div>
        <div class="right" style="padding-top: 100px">
            <div class="avatar">
                <h2 style="color: black;">
                    Ảnh hồ sơ
                </h2>
                <img src="{{asset('uploads/' . $hoso->avatar)}}" height="180px" width="150px">
            </div>

            <div class="QR">
                <img src="{{asset('uploads/qr.png')}}" height="180px" width="180px">
            </div>

        </div>

    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>

        function demoFromHTML() {
        var pdf = new jsPDF('p', 'pt', 'letter');
 
        source = $('#detail3-container')[0];
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };
 
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF 
                //          this allow the insertion of new lines after html
                pdf.save('Test.pdf');
            }, margins
        );
    }
    </script>

</body>
@endsection