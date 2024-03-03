<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;
    // use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'tbldiskon';

    protected $fillable = [
        'diskon',
    ];

    // protected $hidden = [
    //     'password',
    // ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}