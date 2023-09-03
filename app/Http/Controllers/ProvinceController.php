<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Status;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinceController extends Controller
{
    public function getData($id)
    {
        $data = Province::where('id', $id)->get();
        dd($data);
        return response()->json($data);
    }
    public function index()
    {
        $Province = Province::all();
        $Office = Office::all();
        $Status = Status::all();
        return view ('Province.index')->with('Province', $Province)->with('Office', $Office)->with('Status', $Status);
        $countries = $this->getCountries();
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Province::create($input);
        return redirect('Province')->with('flash_message', 'Province Addedd!');
    }

    public function edit($id)
    {
        $Province = Province::find($id);
        if($Province){
            return response()->json([
            'status' =>200,
            'province'=>$Province
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
        $Province = Province::find($id);
        $Province->update($request->all());
        return redirect('Province');
    }
    
     


   
}
