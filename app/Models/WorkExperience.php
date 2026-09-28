<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'company',
        'employment_type',
        'workplace_type',
        'location',
        'start_date',
        'end_date',
        'description',
        'achievements',
        'tech_stack',
        'sort_order',
    ];

    protected $casts = [
        'achievements' => 'array',
        'tech_stack'   => 'array',
    ];

    /** Display period string, e.g. "2023 — Present" */
    public function getPeriodAttribute(): string
    {
        $end = $this->end_date ?: 'Present';
        return "{$this->start_date} — {$end}";
    }

    /** Whether this is the current/active role */
    public function getIsCurrentAttribute(): bool
    {
        return empty($this->end_date);
    }
}
