<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Trip;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        return view('admin.trip.index', [
            'title' => 'Trip',
            'trip' => Trip::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.trip.create', [
            'title' => 'Tambah Data Trip'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trip_image' => 'file|image|max:1024',
            'trip_name' => 'required|unique:trips',
            'trip_price' => 'required|numeric',
            'trip_description' => 'required',
        ]);

        if ($request->file('trip_image')) {
            $validatedData['trip_image'] = $request->file('trip_image')->store('trip-images');
        }
        $validatedData['slug'] = Str::slug($validatedData['trip_name']);

        Trip::create($validatedData);

        return redirect('/dashboard/trip')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(Trip $trip)
    {
        return view('admin.trip.show', [
            'title' => 'Detail Trip',
            'trip' => $trip
        ]);
    }
    public function edit(Trip $trip)
    {
        return view('admin.trip.edit', [
            'title' => 'Edit Data',
            'trip' => $trip
        ]);
    }

    public function update(Request $request, Trip $trip)
    {
        $validatedData = $request->validate([
            'trip_image' => 'file|image|max:1024',
            'trip_name' => 'required',
            'trip_price' => 'required|numeric',
            'trip_description' => 'required',
        ]);

        if ($request->file('trip_image')) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }
            $validatedData['trip_image'] = $request->file('trip_image')->store('trip-images');
        }
        $validatedData['slug'] = Str::slug($validatedData['trip_name']);
        Trip::where('id_trip', $trip->id_trip)->update($validatedData);
        return redirect('/dashboard/trip')->with('success', 'Update Data Berhasil!');
    }

    public function destroy(Trip $trip)
    {
        if ($trip->trip_image) {
            Storage::delete($trip->trip_image);
        }
        Trip::destroy($trip->id_trip);
        return redirect('/dashboard/trip')->with('success', 'Data Berhasil Dihapus!');
    }
}
