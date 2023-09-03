<?php

namespace App\Http\Controllers;

use App\Models\City_municipality;
use App\Models\Status;
use App\Models\Province;
use Illuminate\Http\Request;

class CityMunicipalityController extends Controller
{
    public function index()
    {
        $City_municipality = City_municipality::all();
        $Province = Province::all();
        $Status = Status::all();
        return view ('City_municipality.index')->with('City_municipality', $City_municipality)->with('Province', $Province)->with('Status', $Status);
        $countries = $this->getCountries();
    }

    public function store(Request $request)
    {
        $input = $request->all();
        City_municipality::create($input);
        return redirect('City_municipality')->with('flash_message', 'City_municipality Addedd!');
    }

    public function edit($id)
    {
        $City_municipality = City_municipality::find($id);
        if($City_municipality){
            return response()->json([
            'status' =>200,
            'city_municipality'=>$City_municipality
             ]);
        }
        else{
            return response()->json([
                'status' =>200,
                'message'=>'Not Found'
                 ]);
        }
        
       
    }

    public function update(Request $request, string $id)
    {
        $City_municipality = City_municipality::find($id);
        $City_municipality->update($request->all());
        return redirect('City_municipality');
    }
}
