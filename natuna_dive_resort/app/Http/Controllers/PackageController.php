<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;

class PackageController extends Controller
{
    public function index()
    {
        return view('admin.package.index', [
            'title' => 'Package',
            'package' => Package::latest()->get()
        ]);
    }
    public function show(Package $package)
    {
        return view('admin.package.show', [
            'title' => 'Detail Paket',
            'package' => $package
        ]);
    }
    public function create()
    {
        return view('admin.package.create', [
            'title' => 'Tambah Data Paket'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar_paket' => 'image|file|max:1024',
            'nama_paket' => 'required',
            'fasilitas_paket' => 'required',
            'harga_paket' => 'required',
            'iternary' => 'required'
        ]);
        if ($request->file('gambar_paket')) {
            $validatedData['gambar_paket'] = $request->file('gambar_paket')->store('package-images');
        }
        $validatedData['slug'] = Str::slug($validatedData['nama_paket']);
        // dd($validatedData);
        Package::create($validatedData);
        return redirect('/dashboard/package')->with('success', 'Tambah Data Berhasil!');
    }

    public function destroy(Package $package)
    {
        if ($package->gambar_paket) {
            Storage::delete($package->gambar_paket);
        }
        Package::destroy($package->id_package);
        return redirect('/dashboard/package')->with('success', 'Data Berhasil Dihapus!');
    }

    public function edit(Package $package)
    {
        return view('admin.package.edit', [
            'title' => 'Edit Data',
            'package' => $package
        ]);
    }
    public function update(Request $request, Package $package)
    {
        $validatedData = $request->validate([
            'gambar_paket' => 'image|file|max:1024',
            'nama_paket' => 'required',
            'fasilitas_paket' => 'required',
            'harga_paket' => 'required',
            'iternary' => 'required'
        ]);
        if ($request->file('gambar_paket')) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }
            $validatedData['gambar_paket'] = $request->file('gambar_paket')->store('package-images');
        }
        $validatedData['slug'] = Str::slug($validatedData['nama_paket']);
        Package::where('id_package', $package->id_package)->update($validatedData);
        return redirect('/dashboard/package')->with('success', 'Update Data Berhasil!');
    }
}
