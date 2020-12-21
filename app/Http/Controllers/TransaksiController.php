<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $Transaksi = Transaksi::select(
            'transaksi.id',
            'transaksi.pembeli_id',
            'transaksi.produk_id',
            'transaksi.jumlah',
            // 'transaksi.total_harga',
            'transaksi.status',
            'pembeli.nama as nama',
            'produk.nama as produks',
            // 'produk.harga*transaksi.jumlah AS total',

        )->join('pembeli','pembeli.id','=','transaksi.pembeli_id')
        ->join('produk','produk.id','=','transaksi.produk_id')->get();
            
        // orderBy('id','asc')->paginate(5);
        return view('Pembeli.Transaksi',compact('Transaksi'))
                ->with('i',(request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::select('*')->get();
        // dd($produk);
        return view('Pembeli.createTransaksi',compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = Produk::find($request->produk_id);
        $total=$request->jumlah;
        $Transaksi = Transaksi::create([
            'pembeli_id' => $request->pembeli_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            // 'total_harga' => $produk->harga * $request->jumlah,
            'status'=>$request->status,
        ]);
        dd($Transaksi);


        
        return redirect()->route('Transaksi.index')
                         ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Transaksi = Transaksi::select(

        )->join('nama tabel','tujuan_tabel','=','dari.asda')->
        
        
        find($id);

        return view('Transaksi.detail-profile', compact('Transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Transaksi = Transaksi::find($id);

        return view('Pembeli.editTransaksi', compact('Transaksi'));
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
            'nama'=>'required',
            'harga' => 'required',
            'stok'=>'required',
            'Pembeli_id' => 'required',
            'foto' => 'required'
        ]);
        $Transaksi = Transaksi::find($id);
        $Transaksi->nama = $request->get('nama');
        $Transaksi->harga = $request->get('harga');
        $Transaksi->stok = $request->get('stok');
        $Transaksi->Pembeli_id = $request->get('Pembeli_id');
        $Transaksi->foto = $request->get('foto');
        $Transaksi->save();

        return redirect()->route('Transaksi.index')
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
        $Transaksi = Transaksi::find($id);
        $Transaksi->delete();

        return redirect()->route('Transaksi.Transaksi')
                         ->with('success', 'Data Alumni berhasil dihapus');
    }
}