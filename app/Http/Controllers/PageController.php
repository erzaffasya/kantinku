<?php

namespace App\Http\Controllers;
use App\Models\Produk;
// use App\Models\Transaksi;
// use App\Models\Seller;
// use App\Models\User;
// use App\Models\Buyer;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
            $produk = Produk::get();          
            // dd($produk);
            return view('page', compact('produk'));
        }
        
    }