<?php

namespace App\Http\Controllers;

use App\Models\User_type;
use App\Models\Status;
use Illuminate\Http\Request;

class UsertypeController extends Controller
{
    public function index()
    {
        $User_type = User_type::all();
        $Status = Status::all();
        return view ('User_type.index')->with('User_type', $User_type)->with('Status', $Status);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        User_type::create($input);
        return redirect('User_type')->with('flash_message', 'USER TYPE ADDED!');
    }

    public function update(Request $request, string $id)
    {
        $User_type = User_type::find($id);
        $User_type->update($request->all());
        return redirect('User_type')->with('update_message', ' USER TYPE UPDATED!');
}
}