<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Link;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    // Mengambil link milik user yang sedang login dari database
    $links = $user->links()->orderBy('order')->get();

    // Data profil statis untuk dashboard (bio dan photo)
    $profile = [
        'name' => $user->name, 
        'bio' => 'Informatics Student at UNS', 
        'photo' => asset('images/baymax.jpg'), 
    ];

    return view('dashboard', compact('user', 'links', 'profile'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/links', \App\Http\Controllers\LinkController::class);
});

Route::get('/@{username}', function ($username) {
    // Ambil user berdasarkan username (asumsi kolom 'name' digunakan sebagai username)
    $user = User::where('name', $username)->firstOrFail();

    // Mengambil link milik user tersebut dari database
    $links = $user->links()->orderBy('order')->get();

    // Data profil statis untuk halaman profil publik (bio dan photo)
    $profile = [
        'name' => $user->name, // Nama tetap diambil dari user di database
        'bio' => 'Informatics Student at UNS 👩🏻‍💻', // Static Bio
        'photo' => asset('images/baymax.jpg'), // Static Photo
    ];

    return view('public.profile', compact('profile', 'links'));
});


require __DIR__.'/auth.php';