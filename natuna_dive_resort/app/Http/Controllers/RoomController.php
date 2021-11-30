<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Support\Facades\Storage;
use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.rooms.index', [
            'title' => 'Room',
            'rooms' => Room::latest()->get()
        ]);
    }
    public function create()
    {
        return view('admin.rooms.create', [
            'title' => 'Tambah Data Kamar'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar_kamar' => 'image|file|max:1024',
            'nama_kamar' => 'required|unique:rooms',
            'fasilitas_kamar' => 'required',
            'harga_kamar' => 'required',
        ]);
        if ($request->file('gambar_kamar')) {
            $validatedData['gambar_kamar'] = $request->file('gambar_kamar')->store('room-images');
        }
        $validatedData['slug'] = Str::slug($validatedData['nama_kamar']);

        Room::create($validatedData);
        return redirect('/dashboard/room')->with('success', 'Tambah Data Berhasil!');
    }

    public function show(Room $room)
    {
        return view('admin.rooms.show', [
            'title' => 'Detail Paket',
            'room' => $room
        ]);
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', [
            'title' => 'Edit Data Kamar',
            'room' => $room
        ]);
    }

    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'gambar_kamar' => 'image|file|max:1024',
            'nama_kamar' => 'required',
            'fasilitas_kamar' => 'required',
            'harga_kamar' => 'required',
        ]);
        if ($request->file('gambar_kamar')) {
            $validatedData['gambar_kamar'] = $request->file('gambar_kamar')->store('room-images');
        }
        $validatedData['slug'] = Str::slug($validatedData['nama_kamar']);

        Room::where('id_kamar', $room->id_kamar)->update($validatedData);
        return redirect('/dashboard/room')->with('success', 'Update Data Berhasil!');
    }

    public function destroy(Room $room)
    {
        if ($room->gambar_kamar) {
            Storage::delete($room->gambar_kamar);
        }
        room::destroy($room->id_kamar);
        return redirect('/dashboard/room')->with('success', 'Data Berhasil Dihapus!');
    }
}
