<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // <<< Pastikan ini ada!
        'title',
        'url',
        'description',
        'order',
    ];

    // Tambahkan relasi ke User (jika belum ada)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}