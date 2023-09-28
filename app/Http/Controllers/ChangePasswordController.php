<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }
    public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = Auth::user();

    if (Hash::check($request->current_password, $user->password)) {
        $user->password = Hash::make($request->new_password);
        dd($user);
        $user->save();

        return redirect()->route('password.change')->with('success', 'Password changed successfully');
    } else {
        return redirect()->route('password.change')->with('error', 'Current password is incorrect');
    }
}

}
