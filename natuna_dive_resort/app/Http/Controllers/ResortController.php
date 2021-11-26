<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class ResortController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Natuna Dive Resort',
            'package' => Package::latest()->get()
        ]);
    }
}
