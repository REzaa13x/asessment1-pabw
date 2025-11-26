<?php

// app/Http/Controllers/Admin/VolunteerCampaignController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VolunteerCampaign;
use Illuminate\Http\Request;

class VolunteerCampaignController extends Controller
{
    public function index()
    {
        $campaigns = VolunteerCampaign::latest()->get();
        return view('admin.relawan.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.relawan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'status' => 'required',
        ]);

        $campaign = VolunteerCampaign::create($validated);

        return redirect()->route('admin.relawan.show', ['id' => $campaign->id])
            ->with('success', 'Kampanye relawan berhasil dibuat');
    }

    public function show($id)
    {
        $campaign = VolunteerCampaign::with('volunteers')->findOrFail($id);

        // Count volunteers by status - using the actual column name from the Volunteer model
        $pendingCount = $campaign->volunteers->where('status_verifikasi', 'pending')->count();
        $verifiedCount = $campaign->volunteers->whereIn('status_verifikasi', ['disetujui', 'Terverifikasi'])->count();

        return view('admin.relawan.show', compact('campaign', 'pendingCount', 'verifiedCount'));
    }

    public function edit($id)
    {
        $campaign = VolunteerCampaign::findOrFail($id);
        return view('admin.relawan.edit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $campaign = VolunteerCampaign::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'status' => 'required',
        ]);

        $campaign->update($validated);

        return redirect()->route('admin.relawan.show', ['id' => $campaign->id])
            ->with('success', 'Kampanye relawan berhasil diperbarui');
    }

    public function destroy($id)
    {
        VolunteerCampaign::findOrFail($id)->delete();
        return back()->with('success', 'Kampanye berhasil dihapus');
    }
}
