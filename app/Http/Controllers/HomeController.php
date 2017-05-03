<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Package;

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
    public function index(Request $request)
    {

        $packages = Package::all();

        return view('home', compact('package'));
    }
}
