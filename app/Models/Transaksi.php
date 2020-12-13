<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $table = 'transaksi'; 
    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'penjual_id',
        'foto'
    ];
}
