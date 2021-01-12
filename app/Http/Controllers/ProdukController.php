<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Model\Seller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $produk = Produk::where('penjual_id','=',$id)
        
        
        ->orderBy('id','asc')->paginate(5);
        // dd($produk,$id);
        return view('penjual.produk',compact('produk'))
                ->with('i',(request()->input('page',1) -1)*5);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('penjual.createProduk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'stok'=>'required',
            'harga' => 'required',
            'penjual_id' => 'required',
            'image' => 'required'
        ]);
        if (isset($request->image)){
            $extention = $request->image->extension();
            $image_name = time().'.'.$extention;
            $request->image->move(public_path('img\products'),$image_name);
            
        }else{
            $image_name = null;
        }

        $produk = Produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'penjual_id' => $request->penjual_id,
            'foto'=> $image_name
        ]);


        
        return redirect()->route('seller.produk.index',Auth::user()->id)
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
            'nama'=>'required',
            'harga' => 'required',
            'stok'=>'required',
            'penjual_id' => 'required',
            'image' => 'required'
        ]);

//Pake get image gk?

        if (isset($request->image)){
            $extention = $request->image->extension();
            $image_name = time().'.'.$extention;
            $request->image->move(public_path('img\products'),$image_name);
            
        }else{
            $image_name = null;
        }
        $produk = Produk::find($id);
        $produk->nama = $request->get('nama');
        $produk->harga = $request->get('harga');
        $produk->stok = $request->get('stok');
        $produk->penjual_id = $request->get('penjual_id');
        $produk->foto = $image_name;
        $produk->save();

        return redirect()->route('seller.produk.index',Auth::user()->id)
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
        $image = public_path("img/products/{$produk->foto}");
        if (File::exists($image)) {
            unlink($image);
        };
        $produk->delete();

        return redirect()->route('seller.produk.index',Auth::user()->id)
                         ->with('success', 'Data Alumni berhasil dihapus');
    }
}