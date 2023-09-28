<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User = Auth::user();
        $Office = Office::all();
    
        return view('change-password.index')->with('User', $User);
    }
    // public function change_password()
    // {
    //     return view('change-password.index');
    // }
    public function update_password(Request $request)
{
    // Validate the form input
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
        'confirm_password' => 'required|min:8|confirmed',
    ]);
    $current_user=auth()->user();
    // Check if the current password matches the user's password
    if (Hash::check($request->current_password, $current_user->password)) {
        // Update the password
        $current_user->update([
             'password'=>bcrypt($request->new_password)
        ]);
       
        

        return redirect()->back()->with('success', 'Password changed successfully');
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

        dd('ey inside resetcontroller');
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'confirm_password' => 'required|min:8|confirmed',
        ]);
        $current_user=auth()->user();
        // Check if the current password matches the user's password
        if (Hash::check($request->current_password, $current_user->password)) {
            // Update the password
            $current_user->update([
                 'password'=>bcrypt($request->new_password)
            ]);
           
            
    
            return redirect()->back()->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
