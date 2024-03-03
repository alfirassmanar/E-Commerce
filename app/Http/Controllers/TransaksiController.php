<?php

namespace App\Http\Controllers;
// SUPPORT
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF; //library pdf
// MODEL
use App\Models\Barang;
use App\Models\JBarang;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Diskon;
use App\Models\DetailTransaksi;

class TransaksiController extends Controller
{
    public function index(){
        $data = array (
            'title' => 'Data Transaksi',
            'data_transaksi' => Transaksi::all(),
        );
        return view('kasir.transaksi.list', $data);    
       }
       
    //START SELECT BY ID (tbljenisbarang JOIN tblbarang)
    public function cart() {
        $data = array (
            'title'         => 'Cart Pembelian',
            'data_cart'     => JBarang::all(),
            'data_barang'   => Barang::join('tbljenisbarang', 'tbljenisbarang.idJenis', '=', 'tblbarang.idJenis')
                            ->select('tblbarang.*', 'tbljenisbarang.namaJenis')
                            ->get(),
        );
        $cartItems = session('cart', []);

        return view('kasir.transaksi.cart', $data, compact('cartItems'));
    }    
    
    // SHOPING CART 
    public function basket(Request $request, $id) {
        Barang::where('idBarang', $id)
            ->select([
                // nama colom dari tabel
                'idJenis'       => $request->idJenis,
                'namaBarang'    => $request->namaBarang,
                'harga'         => $request->harga,
                'stok'          => $request->stok,
            ]);

        $user = Auth::user()->id;
        $data = array(
            'title'         => 'Menu Pembelian',
            'data_user'     => User::where('id', $user)->GET(),
            'data_diskon'   => Diskon::All(),
            'data_barang'   => Barang::join('tbljenisbarang', 'tbljenisbarang.idJenis', '=', 'tblbarang.idJenis')
                            ->select('tblbarang.*', 'tbljenisbarang.namaJenis')
                            ->where('tblbarang.idBarang', $id)
                            ->get(),
        );

        // NT2023001 NOMOR OTOMATIS
        $now = Carbon::now();
        $thnBulan = $now->year.$now->month;
        $check = Transaksi::count();
        if ($check == 0) {
            $urut   = 10001;
            $nomor  = "NT".$thnBulan.$urut;
        } else {
            $ambil  = Transaksi::all()->last();
            $urut   = (int)substr($ambil->noTransaksi, -5) + 1;
            $nomor  = "NT".$thnBulan.$urut;
        }
        // dd($nomor);
        $cartItems = session('cart', []);

        return view('kasir.transaksi.produk', $data, compact('nomor', 'cartItems'));
    }
    //END JOIN

    public function kasir(Request $request, $id){
        Transaksi::where('id', $id)
        ->where('id', $id)
        ->update([
            'tglTransaksi'  => $request->tglTransaksi,
            'namaBarang'    => $request->namaBarang,
            'pembayaran'    => $request->pembayaran,
            'kembalian'     => $request->pembayaran - $request->totalBayar,
        ]);

        // dd($request)->all();      
        return redirect()->route('admin.transaksi.index')->with('success', 'Pembayaran anda berhasil di proses');

       }

    public function exporthome(){
        //menampilkan halaman laporan
        return view('kasir.transaksi.export');
    }

    public function export(){
        //mengambil data dan tampilan dari halaman laporan_pdf
        //data di bawah ini bisa kalian ganti nantinya dengan data dari database
        $data = PDF::loadview('laporan_pdf', ['data' => 'ini adalah contoh laporan PDF']);
        //mendownload laporan.pdf
    	return $data->download('laporan.pdf');
    }

    public function create(Request $request){
        $data = array (
            'title'     => 'Data Transaksi',
            'dBarang'   => Barang::all(),
            'get_jenis' => JBarang::all(),

            //JOIN TABLE LAIN
            // 'data_transaksi' => Transaksi::join('tblbarang', 'tblbarang.idBarang', '=', 'tbltransaksi.idBarang')
            // ->SELECT('tbltransaksi.*', 'tblbarang.namaBarang')
            // ->GET(),
        );
        // Transaksi::create([
        //     'noTransaksi' => $request->noTransaksi,
        //     'tglTransaksi' => $request->tglTransaksi,
        //     'diskon' => $request->diskon,
        //     'pembayaran' => $request->pembayaran,
        // ]);
        return view('kasir.transaksi.add', $data);
        // return view('home', $data);
    }
}