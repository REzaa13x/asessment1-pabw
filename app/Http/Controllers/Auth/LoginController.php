<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if user exists
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Akun tidak ditemukan. Silakan daftar terlebih dahulu.']);
        }

        // Debug: Show user role before authentication
        \Log::info('User with email ' . $request->email . ' found with role: ' . $user->role);

        // Attempt to log the user in
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Reload the user to make sure we have fresh data
            $user = User::where('email', $request->email)->first();

            // Regenerate session to prevent fixation attacks
            $request->session()->regenerate();

            // Debug: Show user role after authentication
            \Log::info('Session regenerated. User role after authentication: ' . $user->role . ' and email: ' . $user->email);

            // Redirect based on user role
            if ($user->role === 'admin') {
                // Direct redirect to admin dashboard
                \Log::info('Redirecting admin user to /admin/dashboard');
                return redirect()->to('/admin/dashboard');
            } else {
                \Log::info('Redirecting regular user to /');
                return redirect()->to('/');
            }
        }

        // If login fails
        return back()->withErrors([
            'password' => 'Kata sandi yang Anda masukkan salah.',
        ]);
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}