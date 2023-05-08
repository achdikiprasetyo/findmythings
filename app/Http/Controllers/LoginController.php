<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email harus di isi',
            'password.required' => 'Password harus di isi',
        ]);

        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/items')->with('success','Login Berhasil');
        } else {
            return redirect('/login')
                ->withErrors([
                    'message' => 'Email atau password salah',
                ])
                ->withInput();
        }
    }



    public function logout(Request $request)
{
        Auth::logout();
        return redirect('/login')->with('success','Anda Telah Logout');
}


}
