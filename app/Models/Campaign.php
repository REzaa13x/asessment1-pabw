<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'target_amount',
        'current_amount',
        'status',
        'image',
        'end_date',
    ];

    protected $casts = [
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2',
        'end_date' => 'date',
    ];

    // Accessor to handle different image path formats
    public function getImageAttribute($value)
    {
        if (!$value) {
            return null;
        }

        // If it's an external URL, return as is
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        // If it starts with 'public/' or 'storage/', normalize to correct format
        if (str_starts_with($value, 'public/campaigns/')) {
            return str_replace('public/campaigns/', 'campaigns/', $value);
        } elseif (str_starts_with($value, 'storage/campaigns/')) {
            return str_replace('storage/campaigns/', 'campaigns/', $value);
        }

        // Return as is if it's already in 'campaigns/filename' format
        return $value;
    }
}
