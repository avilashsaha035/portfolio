<?php

namespace App\Models;

use Carbon\Carbon;
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
        'tech_stack'   => 'array',
    ];

    /** Display period string, e.g. "Jan 2021 — Present" */
    public function getPeriodAttribute(): string
    {
        $start = $this->formatDateForDisplay($this->start_date);
        $end   = empty($this->end_date) ? 'Present' : $this->formatDateForDisplay($this->end_date);

        return "{$start} — {$end}";
    }

    /** Whether this is the current/active role */
    public function getIsCurrentAttribute(): bool
    {
        return empty($this->end_date);
    }

    /** Formatted date for input[type="date"] (Y-m-d) */
    public function getFormattedStartDateAttribute(): ?string
    {
        return $this->formatDateForInput($this->start_date);
    }

    /** Formatted date for input[type="date"] (Y-m-d) */
    public function getFormattedEndDateAttribute(): ?string
    {
        return $this->formatDateForInput($this->end_date);
    }

    private function formatDateForDisplay(?string $date): string
    {
        if (empty($date)) return '';
        try {
            return Carbon::parse($date)->format('M Y');
        } catch (\Throwable $e) {
            return $date;
        }
    }

    private function formatDateForInput(?string $date): ?string
    {
        if (empty($date)) return null;
        try {
            return Carbon::parse($date)->format('Y-m-d');
        } catch (\Throwable $e) {
            return $date;
        }
    }
}
