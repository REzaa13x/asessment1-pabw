<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use App\Models\VolunteerCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VolunteerVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = VolunteerCampaign::withCount('volunteers')->orderBy('created_at', 'desc')->get();
        $allVolunteers = Volunteer::with('campaign')->orderBy('created_at', 'desc')->get();

        // Group all volunteers by campaign
        $volunteersByCampaign = [];
        foreach ($campaigns as $campaign) {
            $volunteersByCampaign[$campaign->id] = Volunteer::where('volunteer_campaign_id', $campaign->id)->with('campaign')->orderBy('created_at', 'desc')->get();
        }

        return view('admin.volunteers.index', compact('volunteersByCampaign', 'allVolunteers', 'campaigns'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $volunteer = Volunteer::with('campaign')->find($id);

        if (!$volunteer) {
            return redirect()->route('admin.verifikasi-relawan.index')
                ->with('error', 'Data relawan tidak ditemukan');
        }

        return view('admin.volunteers.show', compact('volunteer'));
    }

    /**
     * Display volunteers for a specific campaign.
     */
    public function showByCampaign($campaignId)
    {
        $campaign = VolunteerCampaign::findOrFail($campaignId);
        $campaigns = VolunteerCampaign::all();
        $volunteers = Volunteer::where('volunteer_campaign_id', $campaignId)->with('campaign')->orderBy('created_at', 'desc')->get();

        // Create the volunteersByCampaign array with only the selected campaign
        $volunteersByCampaign = [];
        $volunteersByCampaign[$campaignId] = $volunteers;

        $allVolunteers = Volunteer::with('campaign')->orderBy('created_at', 'desc')->get();

        return view('admin.volunteers.index', compact('volunteersByCampaign', 'allVolunteers', 'campaigns', 'campaign'));
    }

    /**
     * Update the specified resource to approved status.
     */
    public function verify($id)
    {
        $volunteer = Volunteer::findOrFail($id);

        $volunteer->update([
            'status_verifikasi' => 'disetujui'
        ]);

        return redirect()->back()
            ->with('success', 'Relawan berhasil disetujui');
    }

    /**
     * Update the specified resource to rejected status.
     */
    public function reject($id)
    {
        $volunteer = Volunteer::findOrFail($id);

        $volunteer->update([
            'status_verifikasi' => 'ditolak'
        ]);

        return redirect()->back()
            ->with('success', 'Relawan berhasil ditolak');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $volunteer->delete();

        // Redirect back to the referring page
        return redirect()->back()
            ->with('success', 'Data relawan berhasil dihapus');
    }
}