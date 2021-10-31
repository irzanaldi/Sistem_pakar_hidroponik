<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function FormLogin()
    {

        if (Auth::check()) {
            return redirect()->route('dassboard');
        }
        return view('login');
    }

    public function actionlogin(Request $request)
    {
        $rules = [
            'email' => 'required||string|email'
        ];

        $pesan = [
            'email.required' => 'email tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->witherror($validator);
        }

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        Auth::Attempt($data);
        if (Auth::check()) {
            return redirect()->route('dassboard');
        } else {
            Session::flash('error', 'Email atau password salah !');
            return redirect()->route('FormLogin');
        }

        // $data = [
        //     'email' => $request->input('email'),
        //     'password' => $request->input('password'),
        // ];

        // if (Auth::Attempt($data)) {
        //     return redirect('dassboard');
        // } else {
        //     Session::flash('error', 'Email atau Password Salah');
        //     return redirect('actionlogin');
        // }
    }

    public function FormRegister()
    {
        return view('FormRegister');
    }

    public function register(Request $request)
    {
        $rules = [
            'username' => 'required||string',
            'password' => 'required||string'
        ];

        $pesan = [
            'username.required' => 'username tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->witherror($validator);
        }
        $user = new User;
        $user->username = $request->username;
        $user->passwrod = Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            Session::flash('succes', 'data berhasil disimpan');
            return redirect()->route('login');
        } else {
            Session::flash('error', ['' => 'register gagal']);
            return redirect()->route('register');
        }
    }

    public function dassboard()
    {
        $user = User::all();
        return view('dassboard', compact('user'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
