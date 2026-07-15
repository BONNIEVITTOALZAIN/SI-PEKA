<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Doctor;
use App\Models\Schedule;   

class HomeController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->take(5)->get();
        $doctors = Doctor::all();
        $schedules = Schedule::all();

        return view('home', compact('announcements', 'doctors', 'schedules'));
    }
}
