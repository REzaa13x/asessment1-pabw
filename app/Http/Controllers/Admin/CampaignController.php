<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    // Helper: Mengambil semua kampanye dari session
    private function getCampaigns()
    {
        // Ambil array 'campaigns' dari session. Jika kosong, kembalikan array kosong.
        return session('campaigns', []);
    }

    // Helper: Menyimpan array kampanye ke session
    private function saveCampaigns(array $campaigns)
    {
        session(['campaigns' => $campaigns]);
    }

    // [R]EAD: Menampilkan daftar kampanye (Menggunakan nama view baru: daftar-kampanye)
    public function index()
    {
        $campaigns = $this->getCampaigns();
        // Pastikan nama view sesuai dengan nama file baru: 'admin.campaigns.daftar-kampanye'
        return view('admin.campaigns.daftar-kampanye', compact('campaigns'));
    }

    // [C]REATE: Menampilkan form tambah kampanye
    public function create()
    {
        return view('admin.campaigns.create');
    }

    // [C]REATE: Menyimpan kampanye baru ke Session
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'target_amount' => 'required|numeric|min:1000',
            'end_date' => 'nullable|date',
        ]);

        $campaigns = $this->getCampaigns();

        // Buat ID unik dan data tambahan
        $newCampaign = array_merge($validated, [
            'id' => (string) Str::uuid(), // ID unik untuk identifikasi
            'current_amount' => 0,
            'status' => 'Active',
            'created_at' => now()->toDateTimeString(),
        ]);

        $campaigns[] = $newCampaign; // Tambahkan ke array
        $this->saveCampaigns($campaigns); // Simpan kembali ke session

        return redirect()->route('admin.campaigns.index')->with('success', 'Kampanye berhasil dibuat (Non-Database).');
    }

    // [U]PDATE: Menampilkan form edit
    public function edit($id)
    {
        $campaigns = $this->getCampaigns();
        // Menggunakan koleksi Laravel untuk mencari berdasarkan ID
        $campaign = collect($campaigns)->firstWhere('id', $id);

        if (!$campaign) {
            return redirect()->route('admin.campaigns.index')->with('error', 'Kampanye tidak ditemukan.');
        }

        return view('admin.campaigns.edit', compact('campaign'));
    }

    // [U]PDATE: Menyimpan perubahan
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'target_amount' => 'required|numeric|min:1000',
            'end_date' => 'nullable|date',
        ]);

        $campaigns = $this->getCampaigns();
        $index = collect($campaigns)->search(function ($item) use ($id) {
            return $item['id'] === $id;
        });

        if ($index !== false) {
            // Gabungkan data lama dengan data yang divalidasi
            $campaigns[$index] = array_merge($campaigns[$index], $validated);
            $this->saveCampaigns($campaigns);
            return redirect()->route('admin.campaigns.index')->with('success', 'Kampanye berhasil diperbarui.');
        }

        return redirect()->route('admin.campaigns.index')->with('error', 'Kampanye gagal diperbarui.');
    }

    // [D]ELETE: Menghapus kampanye dari Session
    public function destroy($id)
    {
        $campaigns = $this->getCampaigns();

        // Filter array, hanya simpan yang ID-nya TIDAK sama dengan $id
        $updatedCampaigns = array_filter($campaigns, function ($campaign) use ($id) {
            return $campaign['id'] !== $id;
        });

        // Konversi kembali ke array agar formatnya tetap konsisten
        $this->saveCampaigns(array_values($updatedCampaigns));

        return redirect()->route('admin.campaigns.index')->with('success', 'Kampanye berhasil dihapus (Non-Database).');
    }
}