<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    // Menampilkan semua link
    public function index()
    {
        $links = Link::orderBy('order')->get();
        return view('links.index', compact('links'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('links.create');
    }

    // Menampilkan form edit
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    // Menghapus link
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('links.index')->with('success', 'Link berhasil dihapus!');
    }
    // Menyimpan link baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'order' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        Link::create($request->all());

        return redirect()->route('links.index')->with('success', 'Link berhasil ditambahkan!');
    }

    // Memperbarui link
    public function update(Request $request, Link $link)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'order' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        $link->update($request->all());

        return redirect()->route('links.index')->with('success', 'Link berhasil diperbarui!');
    }

}
