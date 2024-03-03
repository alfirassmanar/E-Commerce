<?php

namespace App\Http\Controllers;
// SUPPORT
use Illuminate\Http\Request;
// MODEL
use App\Models\LapTransaksi;
use App\Models\Barang;
use App\Models\JBarang;
use Excel;
use App\Exports\LaporanExport; // Sesuaikan dengan nama file export Anda


class LapTransaksiController extends Controller
{
    public function index(){
        $data = array (
            'title' => 'Data Laporan',
            'data_laporan' => LapTransaksi::all(),
        );
        return view('admin.master.laptransaksi.list', $data);
       }

       public function destroy(Request $request, $id){
        LapTransaksi::where('id', $id)->delete();
        return redirect('/laporan')->with('success', 'anda berhasil menghapus data');
    }
}