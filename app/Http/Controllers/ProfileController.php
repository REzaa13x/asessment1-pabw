<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DonationTransaction;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Calculate total donations amount
        $totalDonation = $user->donationTransactions()->sum('amount');

        // Count all transactions
        $totalTransactions = $user->donationTransactions()->count();

        // Get recent transactions for history (last 5)
        $recentTransactions = $user->donationTransactions()
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('profiles.index', compact('user', 'totalDonation', 'totalTransactions', 'recentTransactions'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile photo upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profile-photos', 'public');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'photo' => $photoPath ?? $user->photo,
        ]);

        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully');
    }

    public function showTransactionHistory()
    {
        $user = Auth::user();

        $transactions = $user->donationTransactions()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('profiles.transactions', compact('transactions'));
    }
}
