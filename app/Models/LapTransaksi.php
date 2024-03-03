<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LapTransaksi extends Model
{
    use HasFactory;
    // use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'tbltransaksi';

    protected $fillable = [
        'id',
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
    public function collection()
    {
        return Laporan::all(); // Sesuaikan dengan cara Anda mengambil data laporan
    }
    // protected $hidden = [
    //     'password',
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}