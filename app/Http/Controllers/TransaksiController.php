<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Transaksi;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $Transaksi = Transaksi::orderBy('id','asc')->paginate(5);
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
        return view('Pembeli.createTransaksi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Transaksi = Transaksi::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'Pembeli_id' => $request->Pembeli_id,
            'foto'=>$request->foto,
        ]);


        
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
        $Transaksi = Transaksi::find($id);

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

        return redirect()->route('Transaksi.index')
                         ->with('success', 'Data Alumni berhasil dihapus');
    }
}