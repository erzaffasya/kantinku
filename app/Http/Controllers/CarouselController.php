<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $Carousel = Carousel::orderBy('id', 'asc')->paginate(5);
        return view('admin.carousel', compact('Carousel'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createCarousel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->image)) {
            $extention = $request->image->extension();
            $image_name = time() . '.' . $extention;
            $request->image->move(public_path('img\banner'), $image_name);
        } else {
            $image_name = null;
        }

        $Buyer = Carousel::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'foto' => $image_name,
        ]);
        return redirect()->route('Carousel.index')
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
        $Carousel = Carousel::find($id);

        return view('Carousel.detail-profile', compact('Carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Carousel = Carousel::find($id);

        return view('admin.editCarousel', compact('Carousel'));
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
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nama_toko' => 'required',
            'image' => 'required'
        ]);

        if (isset($request->image)) {
            $extention = $request->image->extension();
            $image_name = time() . '.' . $extention;
            $request->image->move(public_path('img\avatar'), $image_name);
        } else {
            $image_name = null;
        }

        $Carousel = Carousel::find($id);
        $Carousel->nama = $request->get('nama');
        $Carousel->jenis_kelamin = $request->get('jenis_kelamin');
        $Carousel->alamat = $request->get('alamat');
        $Carousel->nama_toko = $request->get('nama_toko');
        $Carousel->foto = $image_name;
        $Carousel->save();

        return redirect()->route('Carousel.index')
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
        $Carousel = Carousel::find($id);      
        $image = public_path("img/banner/{$Carousel->foto}");
        if (File::exists($image)) {
            unlink($image);
        };

        $Carousel->delete();

        return redirect()->route('Carousel.index')
            ->with('success', 'Data carousel berhasil dihapus');
    }
}
