<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <<< Tambahkan ini

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hanya menampilkan link milik user yang sedang login
        $links = Auth::user()->links()->orderBy('order')->get();
        return view('links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'order' => 'nullable|integer',
        'description' => 'nullable|string',
    ]);

    $userId = Auth::id(); 

    Auth::user()->links()->create($request->all());

    return redirect()->route('links.index')->with('success', 'Link berhasil ditambahkan!');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        // Pastikan link yang diedit adalah milik user yang sedang login
        if ($link->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.'); // Atau redirect ke halaman lain
        }
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        // Pastikan link yang diperbarui adalah milik user yang sedang login
        if ($link->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'order' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        $link->update($request->all());

        return redirect()->route('links.index')->with('success', 'Link berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        // Pastikan link yang dihapus adalah milik user yang sedang login
        if ($link->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $link->delete();
        return redirect()->route('links.index')->with('success', 'Link berhasil dihapus!');
    }
}