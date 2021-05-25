<!DOCTYPE html>
<html>
    <head>
        <title>Đăng Ki</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/dangki.css') }}" rel="stylesheet">
    </head>
    <body>
    @if(session('message'))
        <span>
        <strong>{{session('message')}}</strong>
        </span>
    @endif
        <div class="container">
                <a class="logo" href="#" ><img src="...\viewweb\login\img\logo.png" alt=""></a>
                
                    <li>
                        Trang Đăng Kí
                    </li>
                <img src="...\viewweb\login\img\cet.jpg" alt="width="100%" height="100%"style="max-height:370px;max-width:1000px;">
        </div>
        <div class="container">
            <div class="dangki-form">
                <form action="{{route('auth.post')}}" method="post">
                {{ csrf_field()}} 
                    <h1>Đăng Kí</h1>
                    <div class="input-box">
                        <i ></i>
                        <input type="text" placeholder="Họ và tên" name="name">
                        @if ($errors->has('name'))
                            {{$errors->first('name')}}
                        @endif
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input type="text" placeholder="Email" name="email">
                        @if ($errors->has('email'))
                            {{$errors->first('email')}}
                        @endif
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input type="password" placeholder="Mật khẩu" name="password">
                        @if ($errors->has('password'))
                            {{$errors->first('password')}}
                        @endif
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input type="password" placeholder="Nhập lại mật khẩu" >
                    </div>
                    <div class="tick-box">
                        <input type="checkbox" id="checkbox" name="checkbox"><label class="checkbox-text">Hiện mật khẩu</label>
                    </div>
                    <div class="tick-box">
                        <input type="checkbox" id="checkbox" name="checkbox"><label class="checkbox-text">Tôi đã đọc và đồng ý với các điều khoản của trung tâm</label>
                    </div>
                    <div class="btn-box">
                    <button type="submit">
                            Đăng Kí
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>