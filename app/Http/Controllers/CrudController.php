<?php

namespace App\Http\Controllers;

use App\Crud;
use App\Mhs;
use App\User;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Crud::orderBy('id','DESC')->paginate(3);

       return view('show')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mhs = Mhs::lists('nama','nim','nim1')->toArray();
       return view('add1', compact('mhs'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $tambah = new Crud();
        $tambah->judul = $request['judul'];
        $tambah->isi = $request['isi'];


        // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
        $file       = $request->file('gambar');
        $fileName   = $file->getClientOriginalName();
        $request->file('gambar')->move("image/", $fileName);

        $tambah->gambar = $fileName;
        $tambah->nim = $request['nim'];
        $tambah->nim1 = $request['nim1'];
        $tambah->username_id = Auth::user()->id;
        $tambah->save();


        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tampilkan = Crud::find($id);
       
        
        return view('tampil')->with('tampilkan', $tampilkan);

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $tampiledit = Crud::where('id', $id)->first();
        return view('edit')->with('tampiledit', $tampiledit);
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
         $update = Crud::where('id', $id)->first();
        $update->judul = $request['judul'];
        $update->isi = $request['isi'];
        $update->update();

        return redirect()->to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $hapus = Crud::find($id);
        $hapus->delete();

        return redirect()->to('/')->with('message', 'Data Jabatan Telah Berhasil Dihapus' );;
    }

    public function cetak($id)
    {
        
        $cetak = Crud::where('id', $id)->first();
       
        
        return view('print')->with('cetak', $cetak);

    }
}
