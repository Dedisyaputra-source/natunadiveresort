<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Room;
use App\Models\Package;
use App\Models\Trip;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title' => 'Dashboard',
            'package' => Package::latest()->get(),
            'room' => Room::latest()->get(),
            'trip' => Trip::latest()->get(),
            'event' => Event::latest()->get()
        ]);
    }
}
