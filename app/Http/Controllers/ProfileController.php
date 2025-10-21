<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Menampilkan semua profil
    public function index()
    {
        $profiles = session('profiles', [
            ['id' => 1, 'name' => 'Saskia Naila', 'email' => 'saskia@example.com', 'age' => 21],
            ['id' => 2, 'name' => 'Budi Santoso', 'email' => 'budi@example.com', 'age' => 25],
        ]);

        return view('profiles.index', compact('profiles'));
    }

    // Menampilkan form tambah profil
    public function create()
    {
        return view('profiles.create');
    }

    // Menyimpan profil ke session
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ]);

        $profiles = session('profiles', []);
        $newId = count($profiles) + 1;

        $profiles[] = [
            'id' => $newId,
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
        ];

        session(['profiles' => $profiles]);

        return redirect()->route('profiles.index')->with('success', 'Profil berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $profiles = session('profiles', []);
        $profile = collect($profiles)->firstWhere('id', $id);

        if (!$profile) {
            abort(404);
        }

        return view('profiles.edit', compact('profile'));
    }

    // Update data profil
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ]);

        $profiles = session('profiles', []);
        foreach ($profiles as &$profile) {
            if ($profile['id'] == $id) {
                $profile['name'] = $request->name;
                $profile['email'] = $request->email;
                $profile['age'] = $request->age;
            }
        }

        session(['profiles' => $profiles]);

        return redirect()->route('profiles.index')->with('success', 'Profil berhasil diperbarui!');
    }

    // Hapus profil
    public function destroy($id)
    {
        $profiles = session('profiles', []);
        $profiles = array_filter($profiles, fn($p) => $p['id'] != $id);

        session(['profiles' => array_values($profiles)]);

        return redirect()->route('profiles.index')->with('success', 'Profil berhasil dihapus!');
    }
}
