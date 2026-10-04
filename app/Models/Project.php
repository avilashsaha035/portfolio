<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'project_type',
        'description',
        'image',
        'repo_link',
        'live_link',
        'sort_order',
    ];

    /** Default ordering by drag-and-drop position. */
    protected static function booted(): void
    {
        static::addGlobalScope('ordered', fn ($query) => $query->orderBy('sort_order'));
    }
}
