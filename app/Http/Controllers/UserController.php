<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
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
        return view('admin.User',compact('User'))
                ->with('i',(request()->input('page',1) -1)*5);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createUser');
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

        $User = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'foto'=> $image_name,
        ]);


        event(new Registered($User));
        return redirect()->route('User.index')
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

        return view('admin.editUser', compact('User'));
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

        $User = User::find($id);
        $User->name = $request->get('nama');
        $User->email = $request->get('email');
        $User->role = $request->get('role');

        if (isset($request->password)){
            $User->password = bcrypt($request->get('password'));
        }
        else{}        

        if (isset($request->image)){
            $extention = $request->image->extension();
            $image_name = time().'.'.$extention;
            $request->image->move(public_path('img\avatar'),$image_name);
            
            $User->foto = $image_name;
        }else{}

        $User->save();

        return redirect()->route('User.index')
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
        $User = User::find($id);
        $User->delete();

        return redirect()->route('User.index')
                         ->with('success', 'Data Alumni berhasil dihapus');
    }
}