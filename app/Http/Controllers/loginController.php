<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Auth;

class loginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $remember = $request->remember;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (Auth::user()->status != 1) {
                return redirect()->route('login')->with('message', 'Tài khoản này không còn hiệu lực');
            }
            if (Auth::user()->role == 0) {
                return redirect()->route('home');
            } else {
                return view('admin');
            }
        } else {
            return redirect()->route('auth.login')->with('message', 'Đăng nhập thất bại')->withErrors(['mes'=>'Tài khoản hoặc mật khẩu chưa chính xác']);
        }
    }


    public function logout()
    {
        if (Auth::logout()) {
            return redirect('/');
        }
        return redirect()->route('home');
    }
}
