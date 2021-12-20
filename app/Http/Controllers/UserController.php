<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function home()
    {
        return view('welcome');
    }

    public function register(Request $request)
    {
        $validasiData =  $request->validate([
            'fullname' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'fullname.required' => 'Nama lengkap harus diisi',
            'fullname.min' => 'Nama lengkap minimal 3 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $validasiData['password'] = bcrypt($validasiData['password']);

        $user = User::create($validasiData);

        return redirect('/')->with('success', 'Succesfully registered');
    }
}
