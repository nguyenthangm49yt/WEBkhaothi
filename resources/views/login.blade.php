<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập vào website</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    @if(session('message'))
        <span>
        <strong>{{session('message')}}</strong>
        </span>
    @endif
            <div class="container">
                <a class="logo" href="#" ><img src="C:\Users\MSI gaming\Desktop\viewweb\login\img\logo.png" alt=""></a>
                
                    <li>
                        Trang Đăng Nhập
                    </li>
                <img src="C:\Users\MSI gaming\Desktop\viewweb\login\img\cet.jpg" alt="width="100%" height="100%"style="max-height:370px;max-width:1000px;">
            </div>
            <div class="container">
            <div class="login-form">
                <form action="{{route('auth.login')}}" method="post">
                {{ csrf_field()}} 
                    <h1>Đăng nhập</h1>
                    <div class="input-box">
                        <i ></i>
                        <input type="text" placeholder="Nhập email" name="email">
                        @if ($errors->has('email'))
                            {{$errors->first('email')}}
                        @endif
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input type="password" placeholder="Nhập mật khẩu" name="password">
                        @if ($errors->has('password'))
                            {{$errors->first('password')}}
                        @endif
                    </div>
                    <div class="tick-box">
                        <input type="checkbox" id="checkbox" name="checkbox"><label class="checkbox-text">Hiện mật khẩu</label>
                    </div>
                    <div class="tick-box">
                        <input type="checkbox" id="checkbox" name="remember"><label class="checkbox-text">Nhớ mật khẩu lần sau</label>
                    </div>
                    <div class="btn-box">
                        <button type="submit">
                            Đăng nhập
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>