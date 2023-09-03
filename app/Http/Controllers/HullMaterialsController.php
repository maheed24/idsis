<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Hull_material;
use Illuminate\Http\Request;

class HullMaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Hull_material = Hull_material::all();
        $Status = Status::all();
        return view ('Hull_material.index')->with('Hull_material', $Hull_material)->with('Status', $Status);
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
        Hull_material::create($input);
        return redirect('Hull_material')->with('flash_message', 'Hull_material Addedd!');
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
        $Hull_material = Hull_material::find($id);
        $Hull_material->update($request->all());
        return redirect('Hull_material');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
