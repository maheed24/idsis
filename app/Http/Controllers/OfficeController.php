<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Status;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Office = Office::all();
        $Status = Status::all();
        return view ('Office.index')->with('Office', $Office)->with('Status', $Status);
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
        Office::create($input);
        return redirect('Office')->with('flash_message', 'OFFICE ADDED');
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
        $Office = Office::find($id);
        $Office->update($request->all());
        return redirect('Office')->with('update_message', ' DATA UPDATED!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
