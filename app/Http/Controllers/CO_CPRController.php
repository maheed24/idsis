<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Detail;
use App\Models\Office;
use App\Models\Status;
use App\Models\Rig_type;
use App\Models\Cert_type;
use App\Models\Operation;
use App\Models\Ship_type;
use App\Models\Stem_type;
use App\Models\Stern_type;
use Illuminate\Support\Str;
use App\Models\Trading_area;
use Illuminate\Http\Request;
use App\Models\Hull_material;
use App\Models\Ship_propulsion;
use App\Models\Acquisition_type;
use Illuminate\Support\Facades\DB;
use App\Models\Certificate_license;
use App\Models\Ship_classification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

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
        $User_type = $User_auth->user_type_id;

        if ($User_type == 3) {
            $Detail = Detail::whereIn('change_homeport', ['0'])->get();
        } else {

            $Detail = Detail::whereIn('change_homeport', ['0'])
                ->where('homeport', [$Office_place])->get();
        }
        //dd($Office_place);
        // $Detail_id = Detail::find($request['1']);  

        // $Detail_id = $Detail[0]->id;
        //dd($Detail);

        $Trading_area = Trading_area::all();
        $Hull_material = Hull_material::all();
        $Cert_type = Cert_type::all();
        $Stem_type = Stem_type::all();
        $Stern_type = Stern_type::all();
        $Ship_type = Ship_type::all();
        $Ship_classification = Ship_classification::all();
        // $Ship_propulsion = Ship_propulsion::whereIn('details_id', [$Detail_id])->get();
        //dd($Ship_propulsion);
        $Rig_type = Rig_type::all();
        $Operation = Operation::all();
        $Office_all = Office::all();
        $User = User::whereIn('id', [$User_id])->get();
        $Office = Office::whereIn('id', [$Office_id])->get();
        $Homeport = Office::whereNot('id', [$Office_id])->get();
        // $certificates = Certificate_license::where('details_id', $Detail_id)->get();
        // dd($certificates);
        // $Certificate =  DB::table('certificate_licenses')
        //     ->where('details_id', $Detail_id)
        //     ->join('cert_types', 'certificate_licenses.cert_type_id', '=', 'cert_types.id')
        //     ->select('cert_types.cert_type_desc as desc', DB::raw('cert_id as cert_id, DATE_FORMAT(date_issued, "%D %M %Y") as issued ,sec_no as sec 
        //                 ,date_issued as issuance,  cert_no as certificate_no, details_id as details, DATE_FORMAT(validity, "%D %M %Y") as date_validity, or_no as orno, DATE_FORMAT(or_date, "%D %M %Y") as ordate'))
        //     ->get();
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
            //->with('Ship_propulsion', $Ship_propulsion)
            ->with('Ship_classification', $Ship_classification)
            ->with('Rig_type', $Rig_type)
            ->with('Operation', $Operation)
            ->with('Acquisition_type', $Acquisition_type)
            ->with('Cert_type', $Cert_type)
            //->with('Certificate', $Certificate)
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
        $user = Auth::user();
        $request->validate([
            'ship_name' => 'required|unique:details',
            // Add validation rules for other fields here
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:6120' // Validation rule for images
        ], [
            'ship_name.unique' => 'The Vessel already exists'
            // Custom validation messages for other fields
        ]);

        $Detail = new Detail;

        $Detail->ship_name = $request->input('ship_name');
        $Detail->principal_name = $request->input('principal_name');
        $Detail->company_name = $request->input('company_name');
        $Detail->business_address = $request->input('business_address');
        $Detail->official_no = $request->input('official_no');
        $Detail->imo_no = $request->input('imo_no');
        $Detail->former_ship_name = $request->input('former_ship_name');
        $Detail->ship_type_id = $request->input('ship_type_id');
        $Detail->former_owner = $request->input('former_owner');
        $Detail->trading_area_id = $request->input('trading_area_id');
        $Detail->builder = $request->input('builder');
        $Detail->place_built = $request->input('place_built');
        $Detail->year_built = $request->input('year_built');
        $Detail->modified_by = $request->input('modified_by');
        $Detail->place_modified = $request->input('place_modified');
        $Detail->year_modified = $request->input('year_modified');
        $Detail->length = $request->input('length');
        $Detail->gross_tonnage = $request->input('gross_tonnage');
        $Detail->no_screw = $request->input('no_screw');
        $Detail->no_masts = $request->input('no_masts');
        $Detail->breadth = $request->input('breadth');
        $Detail->net_tonnage = $request->input('net_tonnage');
        $Detail->deadweight = $request->input('deadweight');
        $Detail->no_decks = $request->input('no_decks');
        $Detail->depth = $request->input('depth');
        $Detail->hull_material_id = $request->input('hull_material_id');
        $Detail->stem_type_id = $request->input('stem_type_id');
        $Detail->stern_type_id = $request->input('stern_type_id');
        $Detail->user_id = $user->id;
        $Detail->ship_classification_id = $request->input('ship_classification_id');
        $Detail->rig_type_id = $request->input('rig_type_id');
        $Detail->operation_id = $request->input('operation_id');
        $Detail->call_sign = $request->input('call_sign');
        $Detail->body_no = $request->input('body_no');
        $Detail->homeport = $request->input('homeport');
        $Detail->acquisition_type_id = $request->input('acquisition_type_id');
        $Detail->change_homeport = $request->input('change_homeport');
        $Detail->save();


        // Handle image uploads
        $detail_id = $request->get('detail_id');

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Generate a random name for the image
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
        
                // Resize and compress the image
                $imageResized = InterventionImage::make($image)
                    ->resize(800, 600, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode($image->getClientOriginalExtension(), 75); // Adjust the quality as needed
        
                // Define the path to save the image
                $imagePath = public_path('/storage/img/') . $imageName;
        
                // Save the image to the specified path
                $imageResized->save($imagePath);
        
                // Check if the image was saved successfully
                if (file_exists($imagePath)) {
                    // Store image filename in array
                    $input['images'][] = $imageName;
        
                    // Store image details in images table
                    Image::create([
                        'filename' => $imageName,
                        'path' => '/storage/img/' . $imageName,
                        'detail_id' => $detail_id,
                    ]);
                } else {
                    // Handle the error - image was not saved
                    // You can log the error or throw an exception
                    Log::error('Image could not be saved: ' . $imageName);
                }
            }
        }

        // Convert array of image filenames to a string
        $input['images'] = implode(',', $input['images']);



        return redirect('co_cpr')->with('flash_message', 'NEW VESSEL HAS BEEN ADDED');
    }


    /**
     * Display the specified resource.
     */
    public function viewVessel(Request $request)
    {
        $User_auth = Auth::user();
        $Office_id = $User_auth->office->id;
        $Office_place = $User_auth->office->office_place;

        $Trading_area = Trading_area::all();
        $Hull_material = Hull_material::all();
        $Cert_type = Cert_type::all();
        $Stem_type = Stem_type::all();
        $Stern_type = Stern_type::all();
        $Ship_type = Ship_type::all();
        $Ship_classification = Ship_classification::all();
      
        $Rig_type = Rig_type::all();
        $Operation = Operation::all();
        $Office_all = Office::all();
   
        $Office = Office::whereIn('id', [$Office_id])->get();
        $Homeport = Office::whereNot('id', [$Office_id])->get();
       
        $Acquisition_type = Acquisition_type::all();
        $Status = Status::all();

        $id = $request->input('id');
        $Detail = Detail::where('id', $id)->first();
        // dd($Detail);
        return view('co_cpr.view-vessel')->with('Detail', $Detail)
            ->with('Office', $Office_place)
            ->with('Office_all', $Office_all)
            ->with('Homeport', $Homeport)
            ->with('Ship_type', $Ship_type)
            ->with('Trading_area', $Trading_area)
            ->with('Hull_material', $Hull_material)
            ->with('Stem_type', $Stem_type)
            ->with('Stern_type', $Stern_type)
            //->with('Ship_propulsion', $Ship_propulsion)
            ->with('Ship_classification', $Ship_classification)
            ->with('Rig_type', $Rig_type)
            ->with('Operation', $Operation)
            ->with('Acquisition_type', $Acquisition_type)
            ->with('Cert_type', $Cert_type)
            //->with('Certificate', $Certificate)
            ->with('Status', $Status);
    }

    public function show(string $id)
    {
        $Detail = Detail::find($id);
        return view('co_cpr.show')->with('Detail', $Detail);
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
        return redirect('co_cpr')->with('update_message', 'VESSEL HAVE BEED UPDATED');
    }
    //IMAGE CONTROLLER
    public function imageLoad(Request $request)
    {
        $image = Image::where('detail_id', $request['id'])->get();
        return response()->json(['image' => $image]);
    }
    public function imageUpdate(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:6120' // Validation rule for images
        ]);

        $detail_id = $request->get('detail_id');

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Generate a random name for the image
                $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
        
                // Resize and compress the image
                $imageResized = InterventionImage::make($image)
                    ->resize(800, 600, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode($image->getClientOriginalExtension(), 75); // Adjust the quality as needed
        
                // Define the path to save the image
                $imagePath = public_path('/storage/img/') . $imageName;
        
                // Save the image to the specified path
                $imageResized->save($imagePath);
        
                // Check if the image was saved successfully
                if (file_exists($imagePath)) {
                    // Store image filename in array
                    $input['images'][] = $imageName;
        
                    // Store image details in images table
                    Image::create([
                        'filename' => $imageName,
                        'path' => '/storage/img/' . $imageName,
                        'detail_id' => $detail_id,
                    ]);
                } else {
                    // Handle the error - image was not saved
                    // You can log the error or throw an exception
                    Log::error('Image could not be saved: ' . $imageName);
                }
            }
        }

        // Convert array of image filenames to a string
        $input['images'] = implode(',', $input['images']);

        return redirect('co_cpr')->with('flash_message', 'VESSEL IMAGE HAVE BEEN UPLOADED');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
