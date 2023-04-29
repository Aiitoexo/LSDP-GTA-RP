<?php

namespace App\Http\Controllers;

use App\Models\Actions;
use App\Models\Offenses;
use App\Models\ProfileInMate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $profiles = ProfileInMate::with(['comments', 'arrests.offense', 'arrests'])
            ->get()
            ->map(function ($profile) {
                $profile->convictions = $profile->arrests
                    ->where('has_conviction', true)
                    ->map(function ($arrest) {
                        return [
                            'arrest' => $arrest,
                            'action' => $arrest->offense->action,
                            'created_at_conviction' => $arrest->created_at_conviction,
                        ];
                    })
                    ->unique(null, false)
                    ->values();
                return $profile;
            });

        $convictions = Actions::all();
        $offenses = Offenses::with('action')->get();

        return Inertia::render('Dashboard', [
            'profiles' => $profiles,
            'convictions' => $convictions,
            'offenses' => $offenses
        ]);
    }
}
