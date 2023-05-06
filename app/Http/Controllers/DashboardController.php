<?php

namespace App\Http\Controllers;

use App\Models\Actions;
use App\Models\Arrest;
use App\Models\CommentProfile;
use App\Models\Offenses;
use App\Models\ProfileInMate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $profiles = $this->getProfiles();
        $convictions = Actions::all();
        $offenses = Offenses::with('action')->get();

        return Inertia::render('Dashboard', [
            'profiles' => $profiles,
            'convictions' => $convictions,
            'offenses' => $offenses
        ]);
    }

    public function addProfile(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'identity_number' => 'required|string|max:255',
            'gender' => 'required|boolean',
            'birthday' => 'required|string',
            'address' => 'required|string|max:255',
            'file' => 'required',
        ]);

        $imageName = time() . '_' . uniqid() . '.' . $request->file->getClientOriginalExtension();
        $request->file->storeAs('public/profiles', $imageName);

        $profile = new ProfileInMate;
        $profile->firstname = $data['firstname'];
        $profile->lastname = $data['lastname'];
        $profile->identity_number = $data['identity_number'];
        $profile->gender = $data['gender'];
        $profile->birthday = $data['birthday'];
        $profile->address = $data['address'];
        $profile->picture_url = '/storage/profiles/' . $imageName;
        $profile->save();

        return response()->json($this->getProfiles());
    }

    public function deleteProfile(Request $request)
    {
        $data = $request->validate([
            'profile_in_mate_id' => 'required|exists:profile_in_mates,id',
        ]);

        $arrests = Arrest::where('profile_in_mate_id', $data['profile_in_mate_id'])->get();
        foreach ($arrests as $arrest) {
            $arrest->delete();
        }

        $comments = CommentProfile::where('profile_in_mate_id', $data['profile_in_mate_id'])->get();
        foreach ($comments as $comment) {
            $comment->delete();
        }

        $profile = ProfileInMate::find($data['profile_in_mate_id']);
        $profile->delete();

        return response()->json($this->getProfiles());
    }

    public function getConvictions(Request $request)
    {
        $data = $request->validate([
            'profile_in_mate_id' => 'required|exists:profile_in_mates,id',
        ]);

        $convictions = Arrest::with('offense.action')
            ->where([
                ['profile_in_mate_id', $data['profile_in_mate_id']],
                ['has_conviction', true]
            ])->get();

        return response()->json([
            'convictions' => $convictions
        ]);
    }
    public function addComment(Request $request)
    {
        $data = $request->validate([
            'profile_in_mate_id' => 'required|exists:profile_in_mates,id',
            'content' => 'required'
        ]);

        CommentProfile::create($data);
        $all_comments_profile = CommentProfile::where('profile_in_mate_id', $data['profile_in_mate_id'])
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'comments' => $all_comments_profile
        ]);
    }

    public function deleteComment(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:comment_profiles,id'
        ]);

        $comment = CommentProfile::find($data['id']);
        $comment->delete();

        return response()->json(['message' => 'Success'], 200);
    }

    public function addArrest(Request $request)
    {
        $data = $request->validate([
            'profile_in_mate_id' => 'required|exists:profile_in_mates,id',
            'offense_id' => 'required|exists:offenses,id',
            'payed' => 'boolean'
        ]);

        Arrest::create($data);
        $all_arrests = Arrest::with(['offense' => function($query) {
            $query->orderByDesc('created_at');
        }])->where('profile_in_mate_id', $data['profile_in_mate_id'])
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'arrests' => $all_arrests
        ]);
    }

    public function updateArrest(Request $request)
    {
        $data = $request->validate([
            'arrest_id' => 'required|exists:arrests,id',
            'profile_in_mate_id' => 'required|exists:profile_in_mates,id',
            'offense_id' => 'required|exists:offenses,id',
            'payed' => 'boolean'
        ]);

        $arrest = Arrest::find($data['arrest_id']);
        $arrest->update($data);
        $arrest->save();

        $all_arrests = Arrest::with(['offense' => function($query) {
            $query->orderByDesc('created_at');
        }])->where('profile_in_mate_id', $data['profile_in_mate_id'])
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'arrests' => $all_arrests
        ]);
    }

    public function canceledArrest(Request $request)
    {
        $data = $request->validate([
            'arrest_id' => 'required|exists:arrests,id',
            'profile_in_mate_id' => 'required|exists:profile_in_mates,id',
        ]);

        $arrest = Arrest::find($data['arrest_id']);
        $arrest->fine_remove = true;
        $arrest->save();

        $all_arrests = Arrest::with(['offense' => function($query) {
            $query->orderByDesc('created_at');
        }])->where('profile_in_mate_id', $data['profile_in_mate_id'])
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'arrests' => $all_arrests
        ]);
    }

    public function deleteArrest(Request $request)
    {
        $data = $request->validate([
            'arrest_id' => 'required|exists:arrests,id',
            'profile_in_mate_id' => 'required|exists:profile_in_mates,id',
        ]);

        $arrest = Arrest::find($data['arrest_id']);
        $arrest->delete();

        $all_arrests = Arrest::with(['offense' => function($query) {
            $query->orderByDesc('created_at');
        }])->where('profile_in_mate_id', $data['profile_in_mate_id'])
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'arrests' => $all_arrests
        ]);
    }

    public function addConviction(Request $request)
    {
        $data = $request->validate([
            'arrest_id' => 'required|exists:arrests,id',
            'profile_in_mate_id' => 'required|exists:profile_in_mates,id',
        ]);

        $arrest = Arrest::find($data['arrest_id']);
        $arrest->has_conviction = true;
        $arrest->created_at_conviction = Carbon::now()->format('d/m/y');
        $arrest->save();

        $all_arrests = Arrest::with(['offense' => function($query) {
            $query->orderByDesc('created_at');
        }])->where('profile_in_mate_id', $data['profile_in_mate_id'])
            ->orderByDesc('created_at')
            ->get();

        $all_arrests->convictions = $all_arrests->where('has_conviction', true)
            ->map(function ($arrest) {
                return [
                    'arrest' => $arrest,
                    'action' => $arrest->offense->action,
                    'created_at_conviction' => $arrest->created_at_conviction,
                ];
            })
            ->unique(null, false)
            ->values();


        return response()->json([
            'arrests' => $all_arrests
        ]);
    }

    public function deleteConviction(Request $request)
    {
        $data = $request->validate([
            'arrest_id' => 'required|exists:arrests,id',
            'profile_in_mate_id' => 'required|exists:profile_in_mates,id',
        ]);

        $arrest = Arrest::find($data['arrest_id']);
        $arrest->has_conviction = false;
        $arrest->created_at_conviction = null;
        $arrest->save();

        $all_arrests = Arrest::with(['offense' => function($query) {
            $query->orderByDesc('created_at');
        }])->where('profile_in_mate_id', $data['profile_in_mate_id'])
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'arrests' => $all_arrests
        ]);
    }

    public function getProfiles()
    {
        $profiles = ProfileInMate::with(['comments' => function($query) {
            $query->orderByDesc('created_at');
        }, 'arrests' => function($query) {
            $query->orderByDesc('created_at');
            $query->with(['offense' => function($query) {
                $query->orderByDesc('created_at');
            }]);
        }])
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

        return $profiles;
    }
}
