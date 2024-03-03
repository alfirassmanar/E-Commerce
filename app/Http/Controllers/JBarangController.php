<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JBarang;
// use Illuminate\Support\Facades\Hash;

class JBarangController extends Controller
{
    public function index(){
        $data = array (
            'title' => 'Data Jenis Barang',
            'jenis_barang' => JBarang::all(),
        );
    
        return view('admin.master.jenisbarang.list', $data);
        // return view('home', $data);
       }

       //CREATE DATA JENIS BARANG
       public function store(Request $request){
        JBarang::create([
            // nama colom dari tabel
            'namaJenis' => $request->jenisBarang,
        ]);
        return redirect('/jenisBarang')->with('success', 'anda berhasil menambahkan data');
    }
    
    //UPDATE DATA JENIS BARANG
    public function update(Request $request, $id){
        JBarang::where('idJenis', $id)
        ->where('idJenis', $id)
        ->update([
            'namaJenis' => $request->jenisBarang,
        ]);
        return redirect('/jenisBarang')->with('success', 'anda berhasil mengubah data');
       }
       
    //DELETE DATA JENIS BARANG
    public function destroy(Request $request, $id){
        JBarang::where('idJenis', $id)->delete();
        return redirect('/jenisBarang')->with('success', 'anda berhasil menghapus data');
    }
}