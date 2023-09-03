<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Status;
use App\Models\Ship_type;
use Illuminate\Http\Request;
use App\Models\Ship_classification;
use Illuminate\Support\Facades\Auth;

class ChangeHomeportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User_auth = Auth::user();
        $Office_id = $User_auth->office->id;
        $Office_place = $User_auth->office->office_place;
        $User_id = $User_auth->id;
        //dd($Office_place);
        $Detail = Detail::whereIn('change_homeport', ['1'])
            ->where('homeport', [$Office_place])->get();
    
        return view('change_homeport.index')->with('Detail', $Detail);
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
        //
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
        
      
        $change_home = Detail::find($id);
        $change_home->update($request->all());
        return redirect('change_homeport');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
