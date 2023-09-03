<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Rig_type;
use Illuminate\Http\Request;

class RigtypeController extends Controller
{
    public function index()
    {
        $Rig_type = Rig_type::all();
        $Status = Status::all();
        return view ('Rig_type.index')->with('Rig_type', $Rig_type)->with('Status', $Status);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Rig_type::create($input);
        return redirect('Rig_type')->with('flash_message', 'Rig_type Addedd!');
    }
    public function update(Request $request, string $id)
    {
        $Rig_type = Rig_type::find($id);
        $Rig_type->update($request->all());
        return redirect('Rig_type');
    }

}
