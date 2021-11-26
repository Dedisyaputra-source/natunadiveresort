<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Package;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title' => 'Dashboard',
            'package' => Package::latest()->get(),
            'room' => room::latest()->get()
        ]);
    }
}
