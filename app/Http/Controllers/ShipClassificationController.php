<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Ship_classification;
use Illuminate\Http\Request;

class ShipClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Ship_classification = Ship_classification::all();
        $Status = Status::all();
        return view ('Ship_Classification.index')->with('Ship_Classification', $Ship_classification)->with('Status', $Status);
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
        Ship_classification::create($input);
        return redirect('Ship_Classification')->with('flash_message', 'SHIP CLASSIFICATION ADDED!');
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
        $Ship_classification = Ship_classification::find($id);
        $Ship_classification->update($request->all());
        return redirect('Ship_Classification')->with('update_message', ' DATA UPDATED!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
