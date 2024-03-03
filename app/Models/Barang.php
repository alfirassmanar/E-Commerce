<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    // use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'tblbarang';

    protected $fillable = [
        'idJenis',
        'namaBarang',
        'harga',
        'stok',
        'img_produk',
    ];

    static function detail_barang($idBarang){
        $data = Barang::where("idBarang", $idBarang)->first();
        return $data;
    }

    // protected $hidden = [
    //     'password',
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}