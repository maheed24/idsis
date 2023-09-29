<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function index()
    {
        $Operation = Operation::all();
        $Status = Status::all();
        return view ('Operation.index')->with('Operation', $Operation)->with('Status', $Status);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Operation::create($input);
        return redirect('Operation')->with('flash_message', 'OPERATION ADDED!');
    }
    public function update(Request $request, string $id)
    {
        $Operation = Operation::find($id);
        $Operation->update($request->all());
        return redirect('Operation')->with('update_message', ' DATA UPDATED!');
    }
}
