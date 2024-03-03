<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $data = array (
            'title' => 'Data User',
            'data_user' => User::all(),
        );
    
        return view('admin.master.user.list', $data);
        // return view('home', $data);
       }

       public function profile(){
        $user = Auth::user()->id;
        $data = array (
                'title'         => 'Setting Profile',
                'data_profile'  => User::where('id', $user)->GET(),
            );
            return view('profile', $data);

       }

       public function store(Request $request){
        User::create([
            'nama'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => $request->role,
        ]);
        
        return redirect('/user')->with('success', 'Data berhasil disimpan');
       }

       public function update(Request $request, $id){
        User::where('id', $id)
            ->where('id', $id)
            ->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'role'      => $request->role,
            ]);
            return redirect('/user')->with('success','Data berhasil diubah');
       }

       public function update_profile(Request $request, $id){
        User::where('id', $id)
            ->where('id', $id)
            ->update([
                'name'      => $request->nama,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'role'      => $request->role,
            ]);
            return redirect('/profile')->with('success','Data berhasil diubah');
       }

       public function destroy(Request $request, $id){
        $user = User::where('id', $id)->delete();
        return redirect('/user')->with('success', 'Data berhasil dihapus');
       }
}