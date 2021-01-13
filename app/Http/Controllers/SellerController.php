<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;


class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $User = User::orderBy('id','asc')->paginate(5);
        $Seller = Seller::select(
            'penjual.id',
            'penjual.nama',
            'penjual.jenis_kelamin',
            'penjual.alamat',
            'penjual.user_id',
            'users.foto as foto',
        )->join('users','users.id','=','penjual.id')->orderBy('id','asc')->paginate(5);
        return view('admin.seller',compact('Seller'))
                ->with('i',(request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createSeller');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        if (isset($request->image)){
            $extention = $request->image->extension();
            $image_name = time().'.'.$extention;
            $request->image->move(public_path('img\avatar'),$image_name);
            
        }else{
            $image_name = null;
        }

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make("seller123"),
            'role' => 'seller',
            'foto' => $image_name,
        ]);
        
        $seller = Seller::create([
            'id'=>$user->id,
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nama_toko'=>$request->nama_toko,
            'user_id'=>$user->id
        ]);

        return redirect()->route('Seller.index')
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
        $Seller = Seller::find($id);

        return view('Seller.detail-profile', compact('Seller'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Seller = Seller::find($id);

        return view('admin.editSeller', compact('Seller'));
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

        $Seller = Seller::find($id);
        $Seller->nama = $request->get('nama');
        $Seller->jenis_kelamin = $request->get('jenis_kelamin');
        $Seller->alamat = $request->get('alamat');
        $Seller->nama_toko = $request->get('nama_toko');        
        $Seller->save();

        $User = User::find($id);
        if (isset($request->image)){
            $extention = $request->image->extension();
            $image_name = time().'.'.$extention;
            $request->image->move(public_path('img\avatar'),$image_name);
            
            $User->foto = $image_name;
        }else{
            $image_name = null;
        }       

        return redirect()->route('Seller.index')
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
        $Seller = Seller::find($id);
        $Seller->delete();

        return redirect()->route('Seller.index')
                         ->with('success', 'Data Alumni berhasil dihapus');
    }
}