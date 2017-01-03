<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Crud;

class CariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        $hasil = Crud::where('judul', 'LIKE', '%' . $query . '%')->paginate(10);

        return view('result', compact('hasil', 'query'));
    }
    public function index()
    {
        $cruds = Crud::orderBy('id','DESC')->paginate(3);

       return view('select')->with('cruds', $cruds);
    }
     public function filter(Request $request)
    {
        $query = $request->get('q');
        $hasil = Crud::where('username_id', 'LIKE', '%' . $query . '%')->paginate(10);

        return view('select1', compact('hasil', 'query'));
    }
}