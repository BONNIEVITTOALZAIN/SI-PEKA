<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pemeriksaan;
use App\Models\Payment;
use App\Models\Announcement;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users_pending' => User::whereHas('accountRegistration', function($q) {
                $q->where('status', 'pending');
            })->count(),
            'pemeriksaan_pending' => Pemeriksaan::where('status', 'pending')->count(),
            'payment_pending' => Payment::where('status', 'pending')->count(),
            'announcements' => Announcement::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
