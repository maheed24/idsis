<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Stem_type;
use Illuminate\Http\Request;

class Stem_typeController extends Controller
{
    public function index()
    {
        $Stem_type = Stem_type::all();
        $Status = Status::all();
        return view ('Stem_type.index')->with('Stem_type', $Stem_type)->with('Status', $Status);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Stem_type::create($input);
        return redirect('Stem_type')->with('flash_message', 'STEM TYPE ADDED!');
    }

    public function update(Request $request, string $id)
    {
        $Stem_type = Stem_type::find($id);
        $Stem_type->update($request->all());
        return redirect('Stem_type')->with('update_message', ' DATA UPDATED!');
    }
}
