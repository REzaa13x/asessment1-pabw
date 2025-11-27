<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VolunteerCampaign extends Model
{
    protected $fillable = [
        'image',
        'judul',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    public function volunteers(): HasMany
    {
        return $this->hasMany(Volunteer::class, 'volunteer_campaign_id');
    }
}

