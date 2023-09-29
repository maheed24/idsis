<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Trading_area;
use Illuminate\Http\Request;

class Trading_areaController extends Controller
{
    public function index()
    {
        $Trading_area = Trading_area::all();
        $Status = Status::all();
        return view ('Trading_area.index')->with('Trading_area', $Trading_area)->with('Status', $Status);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Trading_area::create($input);
        return redirect('Trading_area')->with('flash_message', 'TRADING AREA ADDED!');
    }

    public function update(Request $request, string $id)
    {
        $Trading_area = Trading_area::find($id);
        $Trading_area->update($request->all());
        return redirect('Trading_area')->with('update_message', ' DATA UPDATED!');
    }
}
