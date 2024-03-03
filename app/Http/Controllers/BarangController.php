<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JBarang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use App\Http\Requests\BarangRequest;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\Hash;

class BarangController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Barang',
            'jenis_barang' => JBarang::all(),
            //JOIN TABLE LAIN
            'data_barang' => Barang::join('tbljenisbarang', 'tbljenisbarang.idJenis', '=', 'tblbarang.idJenis')
                ->SELECT('tblbarang.*', 'tbljenisbarang.namaJenis')
                ->GET(),

        );

        return view('admin.master.barang.list', $data);
        // return view('home', $data);
    }

    //CREATE DATA BARANG (SOURCE BERBEDA DENGAN YANG LAINNYA)
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'idJenis'       => 'required|idJenis',
            'namaBarang'    => 'required|namaBarang',
            'harga'         => 'required|harga',
            'stok'          => 'required|stok',
            'img_produk'    => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);


        $imgProduk      = $request->file('img_produk');
        $filename       = date('Y-m-d') . $imgProduk->getClientOriginalName();
        $path           = 'img-produk/' . $filename;

        $imgProduk->storeAs('public', $path);

        $data = [
            'idJenis' => $request->idJenis,
            'namaBarang' => $request->namaBarang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'img_produk' => $filename,
        ];

        Barang::create($data);

        return redirect('/dataBarang')->with('success', 'anda berhasil menambahkan data');
    }

    //UPDATE DATA BARANG
    public function update(Request $request, $id)
    {
        // Barang::where('idBarang', $id)
        // ->where('idBarang', $id)
        // ->update([
        //       // nama colom dari tabel
        //       'idJenis'                                                     => $request->idJenis,
        //       'namaBarang'                                                  => $request->namaBarang,
        //       'harga'                                                       => $request->harga,
        //       'stok'                                                        => $request->stok,
        // ]);

        $validator = Validator::make($request->all(), [
            'idJenis'       => 'required|idJenis',
            'namaBarang'    => 'required|namaBarang',
            'harga'         => 'required|harga',
            'stok'          => 'required|stok',
            'img_produk'    => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);


        $imgProduk      = $request->file('img_produk');
        $filename       = date('Y-m-d') . $imgProduk->getClientOriginalName();
        $path           = 'img-produk/' . $filename;

        $imgProduk->storeAs('public', $path);

        $data = [
            'idJenis' => $request->idJenis,
            'namaBarang' => $request->namaBarang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'img_produk' => $filename,
        ];

        Barang::where('idBarang', $id)
            ->where('idBarang', $id)
            ->update($data);

        return redirect('/dataBarang')->with('success', 'anda berhasil mengubah data');
    }

    //DELETE DATA BARANG
    public function destroy(Request $request, $id)
    {
        Barang::where('idBarang', $id)->delete();
        return redirect('/dataBarang')->with('success', 'anda berhasil menghapus data');
    }
}
