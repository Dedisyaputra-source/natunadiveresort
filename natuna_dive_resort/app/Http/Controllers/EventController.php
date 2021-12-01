<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.event.index', [
            'title' => 'Events',
            'events' => Event::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.event.create', [
            'title' => 'Tambah Data',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_image' => 'file|image|max:1024',
            'event_name' => 'required|unique:events',
            'event_price' => 'required|numeric',
            'event_description' => 'required',
        ]);

        if ($request->file('event_image')) {
            $validatedData['event_image'] = $request->file('event_image')->store('event-images');
        }
        $validatedData['slug'] = Str::slug($validatedData['event_name']);

        Event::create($validatedData);

        return redirect('/dashboard/event')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(Event $event)
    {
        return view('admin.event.show', [
            'title' => 'Detail event',
            'events' => $event
        ]);
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit', [
            'title' => 'Edit Data',
            'event' => $event
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'event_image' => 'file|image|max:1024',
            'event_name' => 'required',
            'event_price' => 'required|numeric',
            'event_description' => 'required',
        ]);
        if ($request->file('event_image')) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }
            $validatedData['event_image'] = $request->file('event_image')->store('event-images');
        }
        $validatedData['slug'] = Str::slug($validatedData['event_name']);
        Event::where('id_event', $event->id_event)->update($validatedData);
        return redirect('/dashboard/event')->with('success', 'Update Data Berhasil!');
    }

    public function destroy(Event $event)
    {
        if ($event->event_image) {
            Storage::delete($event->event_image);
        }
        Event::destroy($event->id_event);
        return redirect('/dashboard/event')->with('success', 'Data Berhasil Dihapus!');
    }
}
