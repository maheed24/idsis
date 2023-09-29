<?php

namespace App\Http\Controllers;

use App\Models\Cert_type;
use App\Models\Certificate_license;
use App\Models\Status;
use Illuminate\Http\Request;

class Cert_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Cert_type = Cert_type::all();
        $Status = Status::all();
        return view ('Cert_type.index')->with('Cert_type', $Cert_type)->with('Status', $Status);
        
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
        Cert_type::create($input);
        return redirect('Cert_type')->with('add_message', 'DATA ADDED!');
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
    public function edit(string $cert_id)
    {
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'cert_type_desc' => 'required',
            'cert_type_abbr' => 'required',
            'cert_type_code' => 'required',
            'status_id' => 'required'
            
        ]); 
        $Cert_type = Cert_type::find($id);

        $Cert_type->cert_type_desc = $request->input('cert_type_desc');
        $Cert_type->cert_type_abbr = $request->input('cert_type_abbr');
        $Cert_type->certype_code = $request->input('cert_type_code');
        $Cert_type->status_id = $request->input('status_id');

        $Cert_type->update();
       
        return redirect('Cert_type')->with('update_message', ' DATA UPDATED!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
