<?php

use App\Models\Detail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Ship_propulsion;
use App\Models\Certificate_license;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

///SHIP PROPULSION ADD
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/edit-detail/{id}', function(Request $request){
    // return response()->json(['data'=> $request->all()]);

    $details = Detail::where('id', $request['id'])->with(['certificate_licenses','shipPropulsions'])->first(); 


    // $details = Detail::whereHas('certificate_licenses')->get();

    return response()->json(['data'=> $details]); 


    // $Detail = Detail::find($id)->with(['shipPropulsions']);
    // if ($Detail) {
    //     return response()->json([
    //         'status' => 200,
    //         'detail' => $Detail
    //     ]);
    // } else {
    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'Not Founds'
    //     ]);
    // }
});

Route::get('/edit-certificate/{id}', function(Request $request){

     $certificate = Certificate_license::where('cert_id',$request['id'])->first();
    return response()->json(['data'=>$certificate]);
    // return response()->json(['data'=> $request->all()]);
});
Route::get('/edit-certificate', function(Request $request){


    
    $certificate_licenses = Certificate_license::find($request['id']);
        if ($certificate_licenses) {
            return response()->json([
                'status' => 200,
                'certificate' => $certificate_licenses
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'Not Founds'
            ]);
        }

 })->name('certificate.edit');


Route::get('/create-ship', function(Request $request){


    //  return response()->json(['data'=>$request->all()]);
    $new_ship_propulsion = Ship_propulsion::create([
        'engine_make'=> $request['engine_make'],
        'serial_no'=> $request['serial_no'],
        'horsepower'=> $request['horsepower'],
        'no_cyclinder'=> $request['no_cyclinder'],
        'cycle'=> $request['cycle'],
        'status_id'=> (int)$request['status_id'],
        'details_id'=> (int)$request['details_id'],
    ]);
    return response()->json(['data'=>$new_ship_propulsion]);
    

    // return response()->json(['data' => $newShipPropulsion, 'message' => 'success']);
    
    return response()->json(['data'=> $new_ship_propulsion,'m'=> ''] );


 })->name('ship.create');

 //SHIP PROPULSION EDIT
 Route::get('/update-ship', function(Request $request) {

     
     
     $ship_propulsion = Ship_propulsion::find((int)$request->input('id'));
    

    if (!$ship_propulsion) {
        return response()->json(['error' => 'Ship propulsion not found'], 404);
    }

    $ship_propulsion->update([
        'engine_make' => $request->input('engine_make'),
        'serial_no' => $request->input('serial_no'),
        'horsepower' => $request->input('horsepower'),
        'no_cyclinder' => $request->input('no_cyclinder'),
        'cycle' => $request->input('cycle'),
        'status_id' => (int) $request->input('status_id'),
    ]);

    return response()->json(['data' => $ship_propulsion]);
})->name('ship.update');


/// CHANGE HOMEPORT 

Route::get('/change-homeport', function(Request $request){


    $change_home = Detail::find($request['details_id']);

    $change_home->update([
        'change_homeport'=> 1,
    
    ]);
    
    
    return response()->json(['data'=> $change_home] );


 })->name('home.update');

// HISTORY/CERTIFICATE EDIT
Route::get('/update-cert', function(Request $request){
  
    // return response()->json(['data'=> $request->all()]);
    $certificate = Certificate_license::find($request['cert_id']);
   
    $certificate->update([
        'or_no'=> (int)$request['or_no'],
        'or_date'=> $request['or_date'],
        'cert_no'=> (int)$request['cert_no'],
        'sec_no'=> $request['sec_no'],
        'cert_type_id'=> $request['cert_type_id'],
        'amount'=> (int)$request['amount'],
        'date_issued'=> $request['date_issued'],
        'validity'=> $request['validity'],
        'details_id'=> (int)$request['details_id'],
    ]);
    

    // return response()->json(['data' => $newShipPropulsion, 'message' => 'success']);
    
    return response()->json(['data'=> $certificate,'m'=> ''] );


 })->name('cert.update');



// HISTORY/CERTIFICATE ADD

 Route::get('/create-cert', function(Request $request){
   
    $new_certificate = Certificate_license::create([
        'or_no'=> (int)$request['or_no'],
        'or_date'=> $request['or_date'],
        'cert_no'=> (int)$request['cert_no'],
        'sec_no'=> $request['sec_no'],
        'cert_type_id'=> $request['cert_type_id'],
        'amount'=> (int)$request['amount'],
        'qr_code'=> Str::random(10),
        'date_issued'=> $request['date_issued'],
        'validity'=> $request['validity'],
        'details_id'=> (int)$request['details_id'],
    ]);
    

    // return response()->json(['data' => $newShipPropulsion, 'message' => 'success']);
    
    return response()->json(['data'=> $new_certificate,'m'=> ''] );


 })->name('cert.create');

















 