<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Detail;
use App\Models\Office;
use App\Models\Status;
use App\Models\Rig_type;
use App\Models\Operation;
use App\Models\Ship_type;
use App\Models\Stem_type;
use App\Models\Stern_type;
use App\Models\Trading_area;
use Illuminate\Http\Request;
use App\Models\Hull_material;
use App\Models\Ship_propulsion;
use App\Models\Acquisition_type;
use App\Models\Cert_type;
use App\Models\Certificate_license;
use Illuminate\Support\Facades\DB;
use App\Models\Ship_classification;
use Illuminate\Support\Facades\Auth;

class CO_CPRController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $User_auth = Auth::user();
        $Office_id = $User_auth->office->id;
        $Office_place = $User_auth->office->office_place;
        $User_id = $User_auth->id;

       
        //dd($Office_place);
        $Detail = Detail::whereIn('change_homeport', ['0'])
            ->where('homeport', [$Office_place])->get();
        // $Detail_id = Detail::find($request['1']);  
       
        $Detail_id = $Detail[0]->id;
        //dd($Detail_id);

        $Trading_area = Trading_area::all();
        $Hull_material = Hull_material::all();
        $Cert_type = Cert_type::all();
        $Stem_type = Stem_type::all();
        $Stern_type = Stern_type::all();
        $Ship_type = Ship_type::all();
        $Ship_classification = Ship_classification::all();
        $Ship_propulsion = Ship_propulsion::whereIn('details_id', [$Detail_id])->get();
        //dd($Ship_propulsion);
        $Rig_type = Rig_type::all();
        $Operation = Operation::all();
        $Office_all = Office::all();
        $User = User::whereIn('id', [$User_id])->get();
        $Office = Office::whereIn('id', [$Office_id])->get();
        $Homeport = Office::whereNot('id', [$Office_id])->get();
        // $certificates = Certificate_license::where('details_id', $Detail_id)->get();
        // dd($certificates);
        $Certificate =  DB::table('certificate_licenses')
            ->where('details_id', $Detail_id)
            ->join('cert_types', 'certificate_licenses.cert_type_id', '=', 'cert_types.id')
            ->select('cert_types.cert_type_desc as desc', DB::raw('cert_id as cert_id, DATE_FORMAT(date_issued, "%D %M %Y") as issued ,sec_no as sec 
                        ,date_issued as issuance,  cert_no as certificate_no, details_id as details, DATE_FORMAT(validity, "%D %M %Y") as date_validity, or_no as orno, DATE_FORMAT(or_date, "%D %M %Y") as ordate'))
            ->get();
        // dd($Certificate);
        $Acquisition_type = Acquisition_type::all();
        $Status = Status::all();
        return view('co_cpr.index')->with('Detail', $Detail)
                    ->with('User', $User)
                    ->with('Office', $Office)
                    ->with('Office_all', $Office_all)
                    ->with('Homeport', $Homeport)
                    ->with('Ship_type', $Ship_type)
                    ->with('Trading_area', $Trading_area)
                    ->with('Hull_material', $Hull_material)
                    ->with('Stem_type', $Stem_type)
                    ->with('Stern_type', $Stern_type)
                    ->with('Ship_propulsion', $Ship_propulsion)
                    ->with('Ship_classification', $Ship_classification)
                    ->with('Rig_type', $Rig_type)
                    ->with('Operation', $Operation)
                    ->with('Acquisition_type', $Acquisition_type)
                    ->with('Cert_type', $Cert_type)
                    ->with('Certificate', $Certificate)
                    ->with('Status', $Status);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function add(Request $request)
    {
        $Ship_propulsion = Ship_propulsion::create($request->all());
        return response()->json($Ship_propulsion);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Detail::create($input);
        return redirect('co_cpr')->with('flash_message', 'DATA ADD!');
    }


    /**
     * Display the specified resource.
     */
    public function shows(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Detail = Detail::find($id)->with(['shipPropulsions']);
        if ($Detail) {
            return response()->json([
                'status' => 200,
                'detail' => $Detail
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'Not Founds'
            ]);
        }
    }
    // public function show($cert_id)
    // {
    //     $Certificate_licenses = Certificate_license::find($cert_id);
    //     if ($Certificate_licenses) {
    //         return response()->json([
    //             'status' => 2000,
    //             'certificate_licenses' => $Certificate_licenses
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'Not Founds'
    //         ]);
    //     }
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Detail = Detail::find($id);
        $Detail->update($request->all());
        return redirect('co_cpr');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
