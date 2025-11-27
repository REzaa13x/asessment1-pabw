<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'name',
        'email',
        'phone',
        'role_selected',
        'status',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
