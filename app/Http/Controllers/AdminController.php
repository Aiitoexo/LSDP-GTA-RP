<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        if (!auth()->user()->is_admin) {
            return redirect()->back();
        }

        $all_users = User::where('is_admin', false)->get();
        $user = auth()->user();

        return Inertia::render('Admin', [
            'all_users' => $all_users,
            'user' => $user,
        ]);
    }

    public function indexResetPassword()
    {
        $user = auth()->user();

        return Inertia::render('MyPassword', [
            'user' => $user
        ]);
    }

    public function addUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        $all_users = User::where('is_admin', false)->get();

        return response()->json([
            'all_users' => $all_users
        ]);
    }
    public function updateUser(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string',
            'email' => 'required|string',
        ]);

        $user = User::find($data['id']);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        $all_users = User::where('is_admin', false)->get();

        return response()->json([
            'all_users' => $all_users
        ]);
    }

    public function deleteUser(Request $request) {
        $data = $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        $user = User::find($data['id']);
        $user->delete();

        $all_users = User::where('is_admin', false)->get();

        return response()->json([
            'all_users' => $all_users
        ]);
    }

    public function resetUser(Request $request) {
        $data = $request->validate([
            'id' => 'required|exists:users,id',
            'password' => 'required',
        ]);

        $user = User::find($data['id']);
        $user->password = Hash::make($request->password);
        $user->save();
    }
}
