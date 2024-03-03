<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
    $data = array (
        'title' => 'Home Page'
    );
    $cartItems = session('cart', []);

    return view('admin.home', $data, compact('cartItems'));
   }

   public function admin(){
    $data = array (
        'title' => 'Home Page'
    );
    return view('admin.home', $data);
   }

   public function kasir(){
    $data = array (
        'title' => 'Home Page'
    );
    return view('kasir.home', $data);
   }

   public function user(){
    $data = array (
        'title' => 'Home Page'
    );
    return view('user.home', $data);
   }
   
}