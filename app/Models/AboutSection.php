<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'about_me',
        'thumbnail',
    ];
}