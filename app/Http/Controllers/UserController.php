<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function becomeOrganizer()
    {
        return view('user.become_organizer');
    }

    public function becomeOrganizerRequest(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'User not authenticated.'], 401);
        }
        $user->organizer_status = 'pending';
        $user->save();

        return redirect()->route('dashboard')->with('message', 'Request to become an organizer is pending approval.');
    }

}
