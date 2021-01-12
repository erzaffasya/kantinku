<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Seller;
use App\Models\User;
use App\Models\Buyer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        if (Auth::user()->role === 'admin') {
            $user = User::orderBy('id', 'asc');
            $transaksi = Transaksi::orderBy('id', 'asc');
            $produk = Produk::orderBy('id', 'asc');
            $seller = Seller::orderBy('id', 'asc');
            // dd($produk,$id);
            return view('dashboard', compact('user','transaksi','seller','produk'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } 
        elseif(Auth::user()->role === 'seller') {
            $user = User::orderBy('id', 'asc')->paginate(5);
            $transaksi = Transaksi::orderBy('id', 'asc')->paginate(5);
            $produk = Produk::where('penjual_id', '=', $id);
            $seller = Seller::where('penjual_id', '=', $id);
            $terjual = Transaksi::select(
                '*')
                ->join('produk','produk.id','=','transaksi.produk_id')
                ->join('penjual','penjual.id','=','produk.penjual_id')
                ->where('status','=','Sudah Bayar')
                ->where('penjual_id','=',$id)
                ->get();
            
            return view('dashboard', compact('user','transaksi','seller','produk','terjual'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        else{
            $user = User::orderBy('id', 'asc')->paginate(5);
            $transaksi = Transaksi::where('pembeli_id', '=' ,$id);
            $belum = Transaksi::where('pembeli_id', '=', $id)
                    ->where('status', '=', 'Belum Bayar');
            $sudah = Transaksi::where('pembeli_id', '=', $id)
                    ->where('status', '=', 'Sudah Bayar');
            // dd($produk,$id);
            return view('dashboard', compact('user','transaksi','belum','sudah'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        
    }

    // public function index($id)
    // {
    //     if (Auth::user()->role === 'admin') {
    //         $user = User::orderBy('id', 'asc');
    //         $transaksi = Transaksi::orderBy('id', 'asc');
    //         $produk = Produk::orderBy('id', 'asc');
    //         $seller = Seller::orderBy('id', 'asc');
    //         // dd($produk,$id);
    //         return view('dashboard', compact('user','transaksi','seller','produk'))
    //             ->with('i', (request()->input('page', 1) - 1) * 5);
    //     } else {
    //         $user = User::orderBy('id', 'asc')->paginate(5);
    //         $transaksi = Transaksi::orderBy('id', 'asc')->paginate(5);
    //         $produk = Produk::where('penjual_id', '=', $id);
    //         $seller = Seller::where('penjual_id', '=', $id);
    //         // dd($produk,$id);
    //         return view('dashboard', compact('user','transaksi','seller','produk'))
    //             ->with('i', (request()->input('page', 1) - 1) * 5);
    //     }
    // }

    // public function buyer()
    // {
    //     $buyer = Buyer::orderBy('id','asc')->paginate(5);
    //     // dd($produk,$id);
    //     return view('penjual.produk',compact('produk'))
    //             ->with('i',(request()->input('page',1) -1)*5);        
    // }

    // public function transaksi()
    // {
    //     $transaksi = Transaksi::orderBy('id','asc')->paginate(5);
    //     // dd($produk,$id);
    //     return view('penjual.produk',compact('produk'))
    //             ->with('i',(request()->input('page',1) -1)*5);        
    // }

    // public function user()
    // {
    //     $user = User::orderBy('id','asc')->paginate(5);
    //     // dd($produk,$id);
    //     return view('penjual.produk',compact('produk'))
    //             ->with('i',(request()->input('page',1) -1)*5);        
    // }
}
