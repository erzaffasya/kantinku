<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    public $table = 'produk'; 
    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'penjual_id',
        'foto'
    ];
}
