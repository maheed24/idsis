<?php

namespace App\Http\Controllers;

use App\Models\Ship_propulsion;
use Illuminate\Http\Request;

class Ship_propulsionController extends Controller
{
    public function store(Request $request)
    {
        dd('dasds');
    $input = $request->all();
        Ship_Propulsion::create($input);
        return redirect('co_cpr')->with('flash_message', 'Ship_Propulsion Addedd!');
    }
    public function index(){
       dd('hey index');
    }
    // public function getMembers(){
    //     $Ship_propulsion = Ship_propulsion::all();
  
    //     return view('Ship_propulsion', compact('Ship_propulsion'));
    // }
    // public function save(Request $request){
    //     if ($request->ajax()){
    //         // Create New Member
    //         $Ship_propulsion = new Ship_propulsion;
    //         $Ship_propulsion->firstname = $request->input('firstname');
    //         $Ship_propulsion->lastname = $request->input('lastname');
    //         // Save Member
    //         $Ship_propulsion->save();
             
    //         return response($Ship_propulsion);
    //     }
    // }
}
