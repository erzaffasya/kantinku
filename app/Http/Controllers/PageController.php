<?php

namespace App\Http\Controllers;
use App\Models\Produk;
// use App\Models\Transaksi;
// use App\Models\Seller;
// use App\Models\User;
use App\Models\Buyer;
use App\Models\Carousel;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
            $buyer = Buyer::get();
            $produk = Produk::where('stok','<','1')->get();
            $Carousel = Carousel::get();
            return view('page', compact('produk','buyer','Carousel'));

        }

    }