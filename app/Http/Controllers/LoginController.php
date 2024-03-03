<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Models\Post;


class LoginController extends Controller
{
    public function index(){
        $data = array (
            'title' => 'Home Login Admin'
        );
    
        return view('auth.login', $data);
        // return view('home', $data);
       }
       
    public function login_proses(Request $request){
        //dd($request)->all(); //var dumb mengecek data sudah terkirim atau tidak
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.home');
            } elseif ($user->role === 'kasir') {
                return redirect()->route('kasir.home');
            } elseif ($user->role === 'user') {
                return redirect()->route('user.home');
            } else {
                echo "data tidak ditemukan";
            }
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password anda salah!');
        }
       }

    public function logout(){
        // dd('oke');
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda berhasil keluar');
       }

    public function registrasi(){
        return view('auth.register');
       }

    public function registrasi_proses(Request $request){

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => $request->role,
        ]);
        
        return redirect('/login')->with('success-regist', 'Anda telah melakukan registrasi');
        
       }
}