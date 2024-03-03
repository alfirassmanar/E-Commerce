<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JBarang extends Model
{
    use HasFactory;
    // use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'tbljenisbarang';

    protected $fillable = [
        'namaJenis',
    ];

    // protected $hidden = [
    //     'password',
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}