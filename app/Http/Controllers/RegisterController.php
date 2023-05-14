<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'nama'=>'required',
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email:dns|max:255|unique:users',
            'password' => 'required|string',
            'alamat'=>'required',
            'no_hp' => 'required',
            'tanggal_lahir' => 'required',
            'role'=> 'required'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        
        User::create($validated);
        return redirect('/login')->with('success','Registrasi Berhasil, Silahkan Login');
    }

}
