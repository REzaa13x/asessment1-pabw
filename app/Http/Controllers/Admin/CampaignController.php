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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // max 5MB
            'end_date' => 'nullable|date',
        ]);

        // Handle image upload - store in campaigns directory
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('campaigns', 'public');
            // $path will be in format 'campaigns/filename.jpg'
            $imagePath = $path;
        } else {
            $imagePath = 'campaigns/default.jpg'; // Default fallback
        }

        $campaign = Campaign::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'target_amount' => $validated['target_amount'],
            'end_date' => $validated['end_date'] ?? null,
            'image' => $imagePath,
            'status' => 'Active', // Default to active when created
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // max 5MB
            'end_date' => 'nullable|date',
        ]);

        $campaign = Campaign::findOrFail($id);

        // Handle image upload - store in campaigns directory
        $imagePath = $campaign->image;
        if ($request->hasFile('image')) {
            // Delete old image if it's not the default Unsplash image
            if ($campaign->image && !str_contains($campaign->image, 'unsplash.com') && $campaign->image !== 'campaigns/default.jpg') {
                Storage::disk('public')->delete($campaign->image);
            }

            $path = $request->file('image')->store('campaigns', 'public');
            // $path will be in format 'campaigns/filename.jpg'
            $imagePath = $path;
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