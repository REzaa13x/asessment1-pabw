<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotifikasiController extends Controller
{
    // 🟦 Tampilkan semua notifikasi
    public function index()
    {
        $notifications = session('notifications', []);
        return view('admin.notifications.index', compact('notifications'));
    }

    // 🟩 Form tambah notifikasi
    public function create()
    {
        return view('admin.notifications.create');
    }

    // 🟨 Simpan notifikasi baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required'
        ]);

        $notifications = session('notifications', []);

        $new = [
            'id' => uniqid(),
            'title' => $request->title,
            'message' => $request->message,
            'created_at' => now()->format('d/m/Y H:i'),
            'updated_at' => null
        ];

        $notifications[] = $new;
        session(['notifications' => $notifications]);

        return redirect()->route('admin.notifications.index')
                         ->with('success', 'Notifikasi berhasil ditambahkan!');
    }

    // 🟧 Form edit notifikasi
    public function edit($id)
    {
        $notifications = session('notifications', []);
        $notification = collect($notifications)->firstWhere('id', $id);

        if (!$notification) {
            return redirect()->route('admin.notifications.index')
                             ->with('error', 'Notifikasi tidak ditemukan.');
        }

        return view('admin.notifications.edit', compact('notification'));
    }

    // 🟪 Update notifikasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required'
        ]);

        $notifications = session('notifications', []);

        foreach ($notifications as &$notification) {
            if ($notification['id'] === $id) {
                $notification['title'] = $request->title;
                $notification['message'] = $request->message;
                $notification['updated_at'] = now()->format('d/m/Y H:i');
                break;
            }
        }

        session(['notifications' => $notifications]);

        return redirect()->route('admin.notifications.index')
                         ->with('success', 'Notifikasi berhasil diperbarui!');
    }

    // 🟥 Hapus notifikasi
    public function destroy($id)
    {
        $notifications = session('notifications', []);
        $filtered = array_filter($notifications, fn($n) => $n['id'] !== $id);

        session(['notifications' => array_values($filtered)]);

        return redirect()->route('admin.notifications.index')
                         ->with('success', 'Notifikasi berhasil dihapus!');
    }
}
