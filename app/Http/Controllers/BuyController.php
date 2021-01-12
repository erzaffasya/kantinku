<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $produk = Produk::where('penjual_id', '=', $id)
            ->orderBy('id', 'asc')->paginate(5);
        return view('pembeli.htransaksi', compact('produk'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $produk = Produk::find($id);
        return view('pembeli.htransaksi', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->produk_id;
        $Transaksi = Transaksi::create([
            'pembeli_id' => $request->pembeli_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga,
            'status' => "Belum Bayar",
        ]);

        $produk = Produk::find($id);
        $hasil = $produk->stok - $request->jumlah;
        $produk->stok = $hasil;
        $produk->save();

        return redirect()->route('Transaksi.index', Auth::user()->id)
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::find($id);

        return view('penjual.editProduk', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'penjual_id' => 'required',
            'foto' => 'required'
        ]);

        //Pake get image gk?

        if (isset($request->image)) {
            $extention = $request->image->extension();
            $image_name = time() . '.' . $extention;
            $request->image->move(public_path('img\products'), $image_name);
        } else {
            $image_name = null;
        }
        $produk = Produk::find($id);
        $produk->nama = $request->get('nama');
        $produk->harga = $request->get('harga');
        $produk->stok = $request->get('stok');
        $produk->penjual_id = $request->get('penjual_id');
        $produk->foto = $image_name;
        $produk->save();

        return redirect()->route('seller.produk.index', Auth::user()->id)
            ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return redirect()->route('seller.produk.index', Auth::user()->id)
            ->with('success', 'Data Alumni berhasil dihapus');
    }
}
