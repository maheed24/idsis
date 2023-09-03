<?php

namespace App\Http\Controllers;

use App\Models\Ship_classification;
use App\Models\Status;
use App\Models\Ship_classification_type;
use App\Models\Ship_type;
use Illuminate\Http\Request;

class Ship_classification_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Ship_classification_type = Ship_classification_type::all();
        $Ship_classification = Ship_classification::all();
        $Ship_type = Ship_type::all();
        $Status = Status::all();
       // dd($Ship_classification_type);
        return view ('Ship_classification_type.index')->with('Ship_classification_type', $Ship_classification_type)->with('Ship_type', $Ship_type)->with('Ship_classification', $Ship_classification)->with('Status', $Status);
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
        Ship_classification_type::create($input);
        return redirect('Ship_classification_type')->with('flash_message', 'Ship_classification_type Addedd!');
    }

    /**
     * Display the specified resource.
     */
    // public function getData(string $id)
    // {
    //     $data = Ship_classification_type::find($id);
    //     return response()->json($data);
       
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Ship_classification_type = Ship_classification_type::find($id);
        if($Ship_classification_type){
            return response()->json([
            'status' =>200,
            'ship_classification_type'=>$Ship_classification_type
             ]);
        }
        else{
            return response()->json([
                'status' =>200,
                'message'=>'Not Found'
                 ]);
        }
        
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Ship_classification_type = Ship_classification_type::find($id);
        $Ship_classification_type->update($request->all());
        return redirect('Ship_classification_type');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
