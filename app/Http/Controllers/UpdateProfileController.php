<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateProfileController extends Controller
{
    public function edit()
    {
        return view('pages.dashboard.update_profile');
    }

    public function update(Request $request)
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,',
            'password' => 'nullable|string|min:6|confirmed'
        ]);

        // Update user details
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('dashboard')->with('success', 'Information updated successfully.');
    }
}
