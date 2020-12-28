<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $User = User::orderBy('id','asc')->paginate(5);
        // dd($User,$id);
        return view('setting',compact('User'))
                ->with('i',(request()->input('page',1) -1)*5);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('newPassword');
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

        $User = User::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'penjual_id' => $request->penjual_id,
            'foto'=> $image_name
        ]);


        
        return redirect()->route('seller.User.index',Auth::user()->id)
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
        $User = User::find($id);

        return view('newPassword', compact('User'));
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
            'password'=>'required',
        ]);

        $User = User::find($id);
        $User->password = bcrypt($request->get('password')) ;
        $User->save();

        return redirect()->route('User.setting.index',Auth::user()->id)
                         ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $User = User::find($id);
    //     $User->delete();

    //     return redirect()->route('seller.User.index',Auth::user()->id)
    //                      ->with('success', 'Data Alumni berhasil dihapus');
    // }
}
