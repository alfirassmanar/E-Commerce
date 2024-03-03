<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'tbldetailtransaksi';

    protected $fillable = [
        'noTransaksi',
        'idBarang',
        'qty',
    ];

    // static function detail_barang($idBarang){
    //     $data = Barang::where("idBarang", $idBarang)->first();
    //     return $data;
    // }

    // protected $hidden = [
    //     'password',
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}