<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
    use HasFactory;
    public $table = 'penjual'; 
    protected $fillable = [
        'id',
        'nama',
        'jenis_kelamin',
        'alamat',
        'nama_toko',
        'user_id'
    ];
}