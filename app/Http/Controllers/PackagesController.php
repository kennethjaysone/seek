<?php

namespace App\Http\Controllers;

use App\Package;

use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index()
    {
    	$packages = Package::all();

    	return view('packages.index', compact('packages'));
    }

    public function show(Package $package)
    {
    	return view('packages.show', compact('package'));
    }
}
