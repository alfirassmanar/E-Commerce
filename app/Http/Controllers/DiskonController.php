<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskon;
// use Illuminate\Support\Facades\Hash;

class DiskonController extends Controller
{
    //READ DATA DISKON
    public function index(){
        $data = array (
            'title' => 'Setting Diskon',
            'data_diskon' => Diskon::all(),
        );
    
        return view('admin.master.diskon.list', $data);
        // return view('home', $data);
       }

    //UPDATE DATA DISKON
    public function update(Request $request, $id){
        Diskon::where('id', $id)
        ->where('id', $id)
        ->update([
            'diskon'        => $request->diskon,
        ]);
        // dd($request)->all();      
        return redirect()->route('admin.diskon.index')->with('success', 'anda berhasil mengubah data');
       }
}