<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolunteerRegistration; // Panggil Model-nya
use Illuminate\Support\Facades\Auth;

class VolunteerRegistrationController extends Controller
{
    // Method ini buat NAMPILIN halaman form (CREATE)
    public function create()
    {
        // Cek kalo user udah login, datanya bisa kita "oper"
        $user = Auth::user();
        return view('volunteer.register', compact('user'));
    }

    // Method ini buat NYIMPEN data dari form (CREATE)
    public function store(Request $request)
    {
        // 1. Validasi (Biar data gak ngasal)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'motivation' => 'required|string|min:20',
            'skills' => 'nullable|string',
        ]);

        // 2. Simpen ke database
        VolunteerRegistration::create([
            'user_id' => Auth::id(), // Kalo login, ID-nya kesimpen. Kalo gak, jadi null.
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'motivation' => $request->motivation,
            'skills' => $request->skills,
            'status' => 'pending' // Status awal
        ]);

        // 3. Balikin ke halaman sukses (atau halaman relawan lagi)
        // Ini PENTING: Bikin halaman 'volunteer_thanks'
        return redirect()->route('home')->with('success', 'Pendaftaran relawan berhasil! Kami akan segera menghubungimu.');
    }
}
