<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $table = 'transaksi'; 
    protected $fillable = [
        'pembeli_id',
        'produk_id',
        'jumlah',
        'status',
        'total_harga'
    ];
}
