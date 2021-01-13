<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buyer extends Model
{
    use HasFactory;
    public $table = 'pembeli'; 
    protected $fillable = [
        'id',
        'nama',
        'jenis_kelamin',
        'alamat',
        'nama_toko',
        'user_id',
    ];
}
