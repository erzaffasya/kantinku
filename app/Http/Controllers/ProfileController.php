<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use App\Models\Buyer;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;

use function PHPUnit\Framework\isEmpty;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        if (Auth::user()->role === 'seller') {
            // $id = Auth::user()->id;
            
            $ambilID = Seller::find($id);
            if($ambilID === null ){
                $user = Seller::create([
                    'id' => Auth::user()->id,
                    'user_id' => Auth::user()->id,
                    ]);
                $profile = Seller::find($id);
                }
            else{
                $profile = Seller::find($id);
            }

            $user = User::find($id);
            // dd($profile,$id);
            return view('profile', compact('profile','user'));
        } else {
           
            
            // $cekID = Buyer::select('id')->find($id);
            // $cekUser = Auth::user()->id;

            $ambilID = Buyer::find($id);
            if($ambilID === null ){
                $user = Buyer::create([
                    'id' => Auth::user()->id,
                    'user_id' => Auth::user()->id,
                    ]);
                $profile = Buyer::find($id);
                }
            else{
                $profile = Buyer::find($id);
            }

            $user = User::find($id);
            // dd($ambilID);
            return view('profile', compact('profile','user'));
        }
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
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nama_toko' => 'required',
        ]);
        if (isset($request->image)) {
            $extention = $request->image->extension();
            $image_name = time() . '.' . $extention;
            $request->image->move(public_path('img\seller'), $image_name);
        } else {
            $image_name = null;
        }

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make("seller123"),
            'role' => 'seller',
        ]);

        $seller = Seller::create([
            'id' => $user->id,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nama_toko' => $request->nama_toko,
            'foto' => $image_name,
            'user_id' => $user->id
        ]);

        return redirect()->route('admin.seller')
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
        if(Auth::user()->role === 'seller'){
            $request->validate([
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'nama_toko' => 'required',
            ]);


            $Seller = Seller::find($id);
            $Seller->nama = $request->get('nama');
            $Seller->jenis_kelamin = $request->get('jenis_kelamin');
            $Seller->alamat = $request->get('alamat');
            $Seller->nama_toko = $request->get('nama_toko');       
            $Seller->save();
            
            $User = User::find($id);

            if (isset($request->image)) {
                $extention = $request->image->extension();
                $image_name = time() . '.' . $extention;
                $request->image->move(public_path('img\avatar'), $image_name);
                
                $User->foto = $image_name;
            } else {
                $image_name = null;
            } 

            $User->name = $request->get('nama');
            $User->save();
            return redirect()->route('User.profile.index',Auth::user()->id)
                ->with('success', 'Data berhasil diupdate');
        }
        else{
            $request->validate([
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
            ]);


            $Buyer = Buyer::find($id);
            $Buyer->nama = $request->get('nama');
            $Buyer->jenis_kelamin = $request->get('jenis_kelamin');
            $Buyer->alamat = $request->get('alamat');      
            $Buyer->save();
            $User = User::find($id);

            if (isset($request->image)) {
                $extention = $request->image->extension();
                $image_name = time() . '.' . $extention;
                $request->image->move(public_path('img\avatar'), $image_name);
                
                $User->foto = $image_name;
            } else {
                $image_name = null;
            } 

            $User->name = $request->get('nama');
            $User->save();
            return redirect()->route('User.profile.index',Auth::user()->id)
                ->with('success', 'Data berhasil diupdate');
        }
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
