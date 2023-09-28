<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User = Auth::user();
        $Office = Office::all();
    
        return view ('profiles.index')->with('User', $User)->with('Office', $Office);
    }
   
    public function changePassword(Request $request)
{
    $user = Auth::user();

    // Validate the form input
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed',
    ]);

    // Check if the current password matches the user's password
    if (Hash::check($request->current_password, $user->password)) {
        // Update the password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('password.change')->with('success', 'Password changed successfully');
    } else {
        return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect']);
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
