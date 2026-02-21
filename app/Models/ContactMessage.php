<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactMessage extends Model
{
    use HasFactory;
    
    // Hanya izinkan kolom ini yang bisa diisi dari form
    protected $fillable = [
        'name',
        'email',
        'instagram',
        'message',
    ];
}