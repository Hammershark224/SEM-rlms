<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('ManageUserProfile.UserProfile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone_num' => 'required',
        ]);
        // dd($request);
        $user = auth()->user();
        // dd($user);
        $user->update([
            'email' => $request->input('email') ,
            'phone_num' => $request->input('phone_num') ,
        ]);
        return back()->with('succes', 'Profile succesfully updated');
    }
}
