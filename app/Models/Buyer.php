<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buyer extends Model
{
    use HasFactory;
    public $table = 'penjual'; 
    protected $fillable = [
        'nama',
        'nim',
        'alamat',
        'programStudi',
    ];
}
