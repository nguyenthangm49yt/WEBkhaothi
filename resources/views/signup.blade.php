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
    <div class="message-header_log">
        <p>{{session('message')}}</p>
    </div>
    @endif
    <div class="container">

        <div class="container__left">
            <a class="logo" href="#"><img src="{{asset('uploads/Untitled-2.png')}}" alt=""></a>
            <li>
                Trang Đăng Kí
            </li>
            <img src="{{asset('uploads/background-basic.png')}}" alt="" width="100%" height="100%">
        </div>
        <div class="container__right">
            <div class="dangki-form">
                <form action="{{route('auth.post')}}" method="post" onSubmit="return checkPassword(this)">
                    {{ csrf_field()}}
                    <h1 class="header-title">Đăng Kí</h1>
                    <div class="input-box">
                        <i></i>
                        <input type="text" placeholder="Họ và tên" name="name">
                        @if ($errors->has('name'))
                        <p class="mes_logs">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="input-box">
                        <i></i>
                        <input type="text" placeholder="Email" name="email">
                        @if ($errors->has('email'))
                        <p class="mes_logs"> {{$errors->first('email')}}</p>
                        @endif
                    </div>

                    <div class="input-box">
                        <i></i>
                        <input type="password" id="password" placeholder="Mật khẩu" name="password">
                        @if ($errors->has('password'))
                        <p class="mes_logs"> {{$errors->first('password')}}</p>
                        @endif
                    </div>
                    <div class="input-box">
                        <i></i>
                        <input type="password" id="confirm_password" placeholder="Nhập lại mật khẩu" name="confirm_password">
                        @if ($errors->has('confirm_password'))
                        <p class="mes_logs"> {{$errors->first('re_password')}}</p>
                        @endif
                    </div>

                    <div class="tick-box">
                        <input type="checkbox" id="checkbox" onclick="handleShowPass()"><label class="checkbox-text">Hiện mật khẩu</label>
                    </div>
                    <div class="tick-box">
                        <input type="checkbox" id="checkbox" name="checkbox-policy"><label class="checkbox-text">Tôi đã đọc và đồng ý với các điều khoản của trung tâm</label>
                        @if ($errors->has('checkbox-policy'))
                        <p class="mes_logs"> {{$errors->first('checkbox-policy')}}</p>
                        @endif
                    </div>
                    <div class="btn-box">
                        <button type="submit">
                            Đăng Kí
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function handleShowPass() {
            var password = document.getElementById("password");
            var confirm_password = document.getElementById("confirm_password");
            if (password.type === "password") {
                password.type = "text";
                confirm_password.type = "text";
            } else {
                password.type = "password";
                confirm_password.type = "password";
            }
        }
    </script>
</body>

</html>