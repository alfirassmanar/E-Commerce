<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    // use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'tbltransaksi';

    protected $fillable = [
        'idBarang',
        'noTransaksi',
        'namaBarang',
        'harga',
        'tglTransaksi',
        'qty',
        'pembayaran',
        'totalBayar',
        'kembalian',
    ];

    // protected $hidden = [
    //     'password',
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}