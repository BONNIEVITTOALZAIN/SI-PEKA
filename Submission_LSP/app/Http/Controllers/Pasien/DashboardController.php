<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Pemeriksaan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->take(5)->get();
        $recentPemeriksaans = Pemeriksaan::where('user_id', Auth::id())->latest()->take(3)->get();

        return view('pasien.dashboard', compact('announcements', 'recentPemeriksaans'));
    }
}
