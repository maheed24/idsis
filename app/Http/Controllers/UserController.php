<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use App\Models\Status;
use App\Models\User_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User = User::all();
        $Office = Office::all();
        $User_type = User_type::all();
        $Status = Status::all();
        return view('User.index')->with('User', $User)->with('Office', $Office)->with('User_type', $User_type)->with('Status', $Status);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updatePass(Request $request, $id)
    {
        $user = User::find($id);

        // if (!$user) {
        //     // Handle the case where the record with $id is not found.
        //     return redirect()->back()->with('error', 'User not found');
        // }

        // Update the user attributes
       //$user->password = Hash::make('password!');

       $user->password = Hash::make($request->input('password'));
       
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->middle_initial = $request->input('middle_initial');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->user_type_id = $request->input('user_type_id');
        $user->office_id = $request->input('office_id');
        $user->status_id = 1;
        $user->save();
        return redirect('User')->with('flash_message', ' Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            // Handle the case where the record with $id is not found.
            return redirect()->back()->with('error', 'User not found');
        }

        // Update the user attributes
        $user->password = Hash::make('password');
       
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $User = User::find($id);
        if ($User) {
            return response()->json([
                'status' => 200,
                'users' => $User
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'Not Found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $User = User::find($id);
        $User->update($request->all());
        return redirect('User');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
