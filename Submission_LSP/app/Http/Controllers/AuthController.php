<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PatientProfile;
use App\Models\AccountRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman register
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Proses register pasien
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'              => 'required|max:100',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|min:6|confirmed',

            'nik'               => 'required|digits:16|unique:patient_profiles,nik',
            'alamat'            => 'required',
            'no_hp'             => 'required',
            'tanggal_lahir'     => 'required|date',
            'jenis_kelamin'     => 'required|in:L,P',
        ]);

        // Simpan user
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => 'pasien'
        ]);

        // Simpan profil pasien
        PatientProfile::create([
            'user_id'           => $user->id,
            'nik'               => $request->nik,
            'alamat'            => $request->alamat,
            'no_hp'             => $request->no_hp,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
        ]);

        // Status akun pending
        AccountRegistration::create([
            'user_id'   => $user->id,
            'status'    => 'pending'
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil. Silakan tunggu verifikasi admin.');
    }

    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses Login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->with('error', 'Email atau Password salah.');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Cek status akun pasien
        if ($user->role == 'pasien') {

            $status = AccountRegistration::where('user_id', $user->id)->first();

            if ($status->status == 'pending') {

                Auth::logout();

                return redirect()->route('login')
                    ->with('error', 'Akun Anda masih menunggu verifikasi admin.');
            }

            if ($status->status == 'ditolak') {

                Auth::logout();

                return redirect()->route('login')
                    ->with('error', 'Pendaftaran akun Anda ditolak.');
            }

            return redirect()->route('pasien.dashboard');
        }

        // Admin
        return redirect()->route('admin.dashboard');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
