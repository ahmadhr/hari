<?php

namespace App\Http\Controllers;

use App\Crud;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Crud::orderBy('id','DESC')->paginate(3);
        return view('show')->with('datas', $datas);
    }
}
