<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check() || auth()->user()->role !== 'admin') {
                abort(403, 'Akses ditolak. Anda bukan admin.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $campaigns = Campaign::all();
        return view('admin.campaigns.daftar-kampanye', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'target_amount' => 'required|numeric|min:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'end_date' => 'nullable|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // PERBAIKAN: Simpan langsung ke disk 'public'.
            // Hasil $imagePath nanti cuma: "campaigns/namafile.jpg"
            $imagePath = $image->storeAs('campaigns', $imageName, 'public');
        }

        Campaign::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'target_amount' => $validated['target_amount'],
            'end_date' => $validated['end_date'] ?? null,
            // Simpan path bersih ke database
            'image' => $imagePath ?: null,
            'status' => 'Active',
        ]);

        return redirect()->route('admin.campaigns.index')->with('success', 'Kampanye berhasil dibuat');
    }

    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('admin.campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'target_amount' => 'required|numeric|min:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'end_date' => 'nullable|date',
        ]);

        $campaign = Campaign::findOrFail($id);
        $imagePath = $campaign->image;

        if ($request->hasFile('image')) {
            // Hapus gambar lama (cek dulu biar ga hapus gambar dummy/unsplash)
            if ($campaign->image && !str_contains($campaign->image, 'http')) {
                // Hapus file lama dari disk public
                Storage::disk('public')->delete($campaign->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // PERBAIKAN: Simpan ke disk public
            $imagePath = $image->storeAs('campaigns', $imageName, 'public');
        }

        $campaign->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'target_amount' => $validated['target_amount'],
            'end_date' => $validated['end_date'] ?? null,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.campaigns.index')->with('success', 'Kampanye berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);

        // Delete image file if it exists and is not the default
        if ($campaign->image && !str_contains($campaign->image, 'unsplash.com')) {
            // Convert storage path to public path for deletion
            $cleanPath = str_replace('storage/', 'public/', $campaign->image);
            // If it starts with public/, just use it directly
            if (!str_starts_with($cleanPath, 'public/')) {
                $cleanPath = 'public/' . $cleanPath;
            }
            Storage::disk('local')->delete($cleanPath);
        }

        $campaign->delete();

        return redirect()->route('admin.campaigns.index')->with('success', 'Kampanye berhasil dihapus.');
    }
}
