<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/links', \App\Http\Controllers\LinkController::class);
});

Route::get('/@{username}', function ($username) {
    $profile = [
        'name' => 'Hana Nadhira Kusuma',
        'bio' => 'Informatics Student at UNS 👩🏻‍💻',
        'photo' => asset('images/baymax.jpg'),
    ];

    $links = \App\Models\Link::orderBy('order')->get();

    return view('public.profile', compact('profile', 'links'));
});


require __DIR__.'/auth.php';
