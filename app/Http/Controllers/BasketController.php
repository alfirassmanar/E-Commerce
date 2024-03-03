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
use App\Models\DetailTransaksi;


class BasketController extends Controller
{
    public function index(){
        $cartItems = session('cart', []);
        $data = [
            'title' => 'Keranjang Belanja',
            'cartItems' => $cartItems,
        ];
    
        return view('kasir.basket.list', $data);

    }
    
    // SHOPING CART DIMULAI DARI SINI dan ada di TransaksiController (function Basket)
    public function tambah_barang(Request $request, $id){
        $cart = session('cart', []);

        if (empty($cart[$request->idBarang])) {
            $cart[$request->idBarang] = [
                'idBarang'      => $request->idBarang,
                'noTransaksi'   => $request->noTransaksi,
                'idBarang'      => $request->idBarang,
                'namaBarang'    => $request->namaBarang,
                'finalHarga'    => $request->finalHarga,
                'img_produk'    => $request->img_produk,
                'qty'           => $request->qty,
            ];
           // $cart[$request->idBarang]['stok'] -= $request->qty; // Update stock based on added quantity
        } else {
            $cart[$request->idBarang]['qty']  += $request->qty; // Corrected increment
        }
    
        session(['cart' => $cart]);

        Barang::where('idBarang', $id)
        ->where('idBarang', $id)
        ->update([
            'stok'  => $request->stok -= $request->qty,
        ]);
    
        return redirect()->route('user.keranjang.index');
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

    public function cart(){
        $cart = session("cart");
        return view("kasir.basket.list")->with("cart", $cart);
    }
}