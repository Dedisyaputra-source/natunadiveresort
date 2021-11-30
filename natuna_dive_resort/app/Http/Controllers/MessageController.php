<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
        return view('admin.message.index', [
            'title' => 'Message',
            'messages' => Message::get()->all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $validatedData['slug'] = Str::slug($validatedData['nama']);

        Message::create($validatedData);

        return redirect('/')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function destroy(Message $message)
    {
        Message::destroy($message->id_message);
        return redirect('/dashboard/message')->with('success', 'Data Berhasil Dihapus!');
    }
}
