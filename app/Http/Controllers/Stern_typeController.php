<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Stern_type;
use Illuminate\Http\Request;

class Stern_typeController extends Controller
{
    public function index()
    {
        $Stern_type = Stern_type::all();
        $Status = Status::all();
        return view ('Stern_type.index')->with('Stern_type', $Stern_type)->with('Status', $Status);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Stern_type::create($input);
        return redirect('Stern_type')->with('flash_message', 'Stern_type Addedd!');
    }

    public function update(Request $request, string $id)
    {
        $Stern_type = Stern_type::find($id);
        $Stern_type->update($request->all());
        return redirect('Stern_type');
    }
}
