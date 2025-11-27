<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerRegistrationController extends Controller
{
    /**
     * HALAMAN 1: Intro / Landing Page Relawan
     * URL: /relawan
     * Deskripsi: Halaman awal buat narik minat user.
     * Tombol "Gabung" disini bakal arahin ke route 'volunteer.campaigns'.
     */
    public function index()
    {
        // Gak perlu bawa data kampanye, biar loading cepet
        return view('volunteer.index');
    }

    /**
     * HALAMAN 2: List Misi / Kampanye
     * URL: /relawan/misi
     * Deskripsi: Halaman grid kartu kampanye. Disini user klik card -> muncul Modal.
     */
    public function listCampaigns()
    {
        // Ambil semua data kampanye (bisa diganti where('status', 'active') kalau perlu)
        $campaigns = Campaign::all();

        // Return ke view khusus list yang baru kamu buat
        return view('volunteer.list', compact('campaigns'));
    }

    /**
     * PROSES: Simpan Data Pendaftaran
     * URL: POST /relawan/daftar
     * Deskripsi: Menangani request AJAX dari Modal Form.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input biar aman
        $validated = $request->validate([
            'campaign_id'   => 'required|exists:campaigns,id',
            'role_selected' => 'required|string',
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'required|string|max:20',
        ]);

        // 2. Simpan ke Database
        Volunteer::create([
            'campaign_id'   => $validated['campaign_id'],
            'role_selected' => $validated['role_selected'],
            'name'          => $validated['name'],
            'email'         => $validated['email'],
            'phone'         => $validated['phone'],
            'status'        => 'pending', // Default pending biar dicek Admin dulu
        ]);

        // 3. Return JSON (Karena kita fetch pake JS)
        return response()->json([
            'status' => 'success',
            'message' => 'Pendaftaran berhasil dikirim! Tunggu persetujuan admin ya.'
        ]);
    }
}
