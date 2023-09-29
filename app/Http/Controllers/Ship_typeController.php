<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Ship_type;
use Illuminate\Http\Request;

class Ship_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Ship_type = Ship_type::all();
        $Status = Status::all();
        return view ('Ship_type.index')->with('Ship_type', $Ship_type)->with('Status', $Status);
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
        $input = $request->all();
        Ship_type::create($input);
        return redirect('Ship_type')->with('flash_message', 'SHIP TYPE ADDED!');
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
        $Ship_type = Ship_type::find($id);
        $Ship_type->update($request->all());
        return redirect('Ship_type')->with('update_message', ' DATA UPDATED!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
