<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập vào website</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    @if(session('message'))
    <div class="message-header_log">
        <p>{{session('message')}}</p>
    </div>
    @endif
    <div class="container">
        <div class="container__left">
            <a class="logo" href="#"><img src="{{asset('uploads/Untitled-2.png')}}" alt=""></a>
            <li>
                Trang Đăng Nhập
            </li>
            <img src="{{asset('uploads/background-basic.png')}}" alt="" width="100%" height="100%">
        </div>
        <div class="container__right">
            <div class="login-form">
                <form action="{{route('auth.login')}}" method="post">
                    {{ csrf_field()}}
                    <h1 class="header-title ">Đăng nhập</h1>
                    <div class="input-box">
                        <i></i>
                        <input type="text" placeholder="Nhập email" name="email">
                        @if ($errors->has('email'))
                        <p class="mes_logs"> {{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="input-box">
                        <i></i>
                        <input type="password" id="input-password" placeholder="Nhập mật khẩu" name="password">
                       
                        @if ($errors->has('password'))
                        <br/>
                        <p class="mes_logs"> {{$errors->first('password')}}</p>
                        @endif
                        @if($errors->has('mes'))
                        <br/>
                        <p class="mes_logs">{{$errors->first('mes')}}</p>
                        @endif
                    </div>

                    <div class="captcha">
                        <div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="6Lc7qAgcAAAAAKJhMxa2eJEVYEwLH3ubePbvF9pR"></div>
                        @if ($errors->has('g-recaptcha-response'))
                        <p class="mes_logs"> {{$errors->first('g-recaptcha-response')}}</p>
                        @endif
                    </div>
                    <br />
                    <div class="tick-box">
                        <input type="checkbox" id="checkbox" name="checkbox" onclick="handleShowPass()"><label class="checkbox-text">Hiện mật khẩu</label>
                    </div>

                    <div class="btn-box">
                        <button type="submit">
                            Đăng nhập
                        </button>
                    </div>
                    <div class="footer">
                        <div class="footer-opt">
                            <p>Bạn chưa có tài khoản? <a href="{{route('auth.signupshow')}}" title="Đăng kí">Đăng kí</a></p>
                        </div>
                        <div class="footer-opt">
                            <p>Quên <a href="#" title="Lấy lại mật khẩu">mật khẩu?</a></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="btn-gohome">
                <a href="{{route('home')}}">Quay lại</a>
            </div>
        </div>
    </div>

    <script>
        function handleShowPass() {
            var x = document.getElementById("input-password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>