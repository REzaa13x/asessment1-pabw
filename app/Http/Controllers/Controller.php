<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Campaign;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home()
    {
        // Get campaigns from the database
        $campaigns = Campaign::where('status', 'Active')->get();

        // Get active volunteer campaigns from the database
        $volunteerCampaigns = \App\Models\VolunteerCampaign::where('status', 'Aktif')
            ->orderBy('tanggal_mulai', 'desc')
            ->get();

        return view('home', compact('campaigns', 'volunteerCampaigns'));
    }
}
