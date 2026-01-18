<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;

    protected $table = 'about_me';

    protected $casts = [
        'social_links' => 'array',
    ];
    protected $fillable = [
        'title',
        'description',
        'image',
        'cv_link',
        'social_links',
    ];
}
