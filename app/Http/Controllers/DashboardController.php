<?php

namespace App\Http\Controllers;

use App\Models\ProfileInMate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $profiles = ProfileInMate::with(['comments', 'arrests.offense.action'])->get();

        return Inertia::render('Dashboard', [
            'profiles' => $profiles
        ]);
    }
}
