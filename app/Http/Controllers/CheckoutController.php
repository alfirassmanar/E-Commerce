<?php

namespace App\Http\Controllers;

// SUPPORT
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
// MODELS
use App\Models\Barang;
use App\Models\JBarang;
use App\Models\User;
use App\Models\Transaksi;

class CheckoutController extends Controller
{
    public function index(){
        $data = array (
            'title' => 'Checkout Belanja',
        );
        $cartItems = session('cart', []);
        return view('kasir.transaksi.checkout', $data, compact('cartItems'));
    }

    public function store(Request $request){

        Transaksi::create([
            'idBarang'      => $request->idBarang,
            'noTransaksi'   => $request->noTransaksi,
            'namaBarang'    => $request->namaBarang,
            'harga'         => $request->harga,
            // 'tglTransaksi'  => $request->tglTransaksi,
            'qty'           => $request->qty,
            // 'pembayaran'    => $request->pembayaran,
            'totalBayar'    => $request->totalBayar,
            // 'kembalian'     => $request->kembalian,
            // 'role'      => $request->role,
        ]);

        $cart = session('cart', []);
        if (isset($cart[$request->idBarang])) {
            unset($cart[$request->idBarang]);
            session(['cart' => $cart]);
        }

        // dd($request)->all();      
          
        return redirect()->route('user.checkout.index')->with('success', 'Checkout diproses silahkan ke kasir');
        // return redirect()->route('user.keranjang.index');

    }
    
    public function removeFromCart(Request $request)
    {
        $cart = session('cart', []);
        if (isset($cart[$request->idBarang])) {
            unset($cart[$request->idBarang]);
            session(['cart' => $cart]);
        }

        return redirect()->route('user.checkout.index');
    }
    // public function removeFromCart(Request $request)
    // {
    //     $cart = session('cart', []);
    //     if (isset($cart[$request->idBarang])) {
    //         unset($cart[$request->idBarang]);
    //         session(['cart' => $cart]);
    //     }

    //     return redirect('/checkout')->with('success', 'Data Checkout Selesai');
    // }
}