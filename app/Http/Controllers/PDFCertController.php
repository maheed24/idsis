<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Rig_type;
use App\Models\Cert_type;
use App\Models\Operation;
use App\Models\Ship_type;
use App\Models\Signatory;
use App\Models\Stem_type;
use App\Models\Stern_type;
use App\Models\TokenMapping;
use App\Models\Trading_area;
use Illuminate\Http\Request;
use App\Models\Hull_material;
use Illuminate\Support\Carbon;
use App\Models\Ship_propulsion;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\Certificate_license;
use App\Models\Ship_classification;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class PDFCertController extends Controller
{
   public function generateQRCode($id)
{
    // Generate a unique token for the ID
   // $token = Str::random(10);

    // Store the mapping between the token and the actual ID in the database
    // TokenMapping::create([
    //     'id' => $id,     // The actual ID
    //     'token' => $token, // The generated token
    // ]);
   // Find the certificate using the ID
//    $certificate = Certificate_license::find($id);
//    $certificateid = $certificate->cert_id;
   
   // Construct the URL with the ID
   $urlWithId = "https://bmarina.bangsamoro.gov.ph/view-detail/{$id}";

   // Generate the QR code with the URL including the ID
   $qrCode = QrCode::size(50)->generate($urlWithId);

   // Save the QR code image to a temporary location
   $tempImagePath = public_path("img/qr_code.png");
   file_put_contents($tempImagePath, $qrCode);

   return $tempImagePath;
}

    public function generatePdf(Request $request)
    {
      
        
        $certificate = Certificate_license::find($request['id']);
        $certificate_id = $certificate->cert_id;
        $qr_code = $certificate->qr_code;
        // $token = "ajkdshak";
        $certificate_type = $certificate->cert_type_id;
        
        // Generate the QR code and get its file path
        $tempImagePath = $this->generateQRCode($qr_code);

        $amount = $certificate->amount;
        $or_number = $certificate->or_no;
        $or_date = Carbon::parse($certificate->or_date);
        $or_dates = $or_date->format('jS F Y');

        $license_no = $certificate->cert_no;
        $cert_name = Cert_type::whereIn('id', [$certificate_type]);

        //DATE FORMAT CONVERTION
        $issue = Carbon::parse($certificate->date_issued);
        $validity = Carbon::parse($certificate->validity);
        $date_validity = $validity->format('jS F Y');
        $date_issued = $issue->format('jS F Y');
        //mm dd, yy
        $date_issue = $issue->format('M d, Y');
        $valid_date = $validity->format('F d, Y');
        

       //DETAILS
        $details_id = $certificate->details_id;
        $Details = Detail::whereIn('id', [$details_id])->get();
        $details_id = $Details[0]->id;

        //OFFICE PLACE
        $User_auth = Auth::user();
        $Office_id = $User_auth->office->id;
        $Office_place = $User_auth->office->office_place;

        //SHIP PROPULSION
        $signatory = Signatory::whereIn('office_id', [$Office_id])->get();
        $results = DB::table('ship_propulsions')
            ->selectRaw('(@row := @row + 1) AS rank, engine_make, serial_no, horsepower, no_cyclinder, cycle')
            ->join('details', 'ship_propulsions.details_id', '=', 'details.id')
            ->join('certificate_licenses', 'details.id', '=', 'certificate_licenses.details_id')
            ->crossJoin(DB::raw('(SELECT @row := 0) r'))
            ->where('certificate_licenses.cert_id', $certificate_id)
            ->where('ship_propulsions.status_id', 1)
            ->get();

        $ship_propulsion = DB::table('ship_propulsions')
            ->select(
                'ship_propulsions.engine_make',
                'ship_propulsions.serial_no',
                'ship_propulsions.horsepower',
                'ship_propulsions.no_cyclinder',
                'ship_propulsions.cycle'
            )
            ->join('details', 'ship_propulsions.details_id', '=', 'details.id')
            ->join('certificate_licenses', 'details.id', '=', 'certificate_licenses.details_id')
            ->where('certificate_licenses.cert_id', '=', $certificate_id)
            ->where('ship_propulsions.status_id', '=', 1)
            ->get();

        //ENGINE NUMBER
        $no = DB::table('ship_propulsions')
            ->select(DB::raw('CONCAT(ship_propulsions.id, " (", COUNT(ship_propulsions.id), ")") as no'))
            ->join('details', 'ship_propulsions.details_id', '=', 'details.id')
            ->join('certificate_licenses', 'details.id', '=', 'certificate_licenses.details_id')
            ->where('certificate_licenses.cert_id', '=', $certificate_id)
            ->where('ship_propulsions.status_id', '=', '1')
            ->groupBy('ship_propulsions.id') // Add this GROUP BY clause
            ->first();



        //Foriegn KEY
        $ship_type_id = $Details[0]->ship_type_id;
        $trading_area_id = $Details[0]->trading_area_id;
        $hull_material_id = $Details[0]->hull_material_id;
        $stem_type_id = $Details[0]->stem_type_id;
        $stern_type_id = $Details[0]->stern_type_id;
        $ship_classification_id = $Details[0]->ship_classification_id;
        $rig_type_id = $Details[0]->rig_type_id;
        $operation_id = $Details[0]->operation_id;


        $Ship_type = Ship_type::whereIn('id', [$ship_type_id])->get();
        $Trading_area = Trading_area::whereIn('id', [$trading_area_id])->get();
        $Hull_material = Hull_material::whereIn('id', [$hull_material_id])->get();
        $Stem_type = Stem_type::whereIn('id', [$stem_type_id])->get();
        $Stern_type = Stern_type::whereIn('id', [$stern_type_id])->get();
        $Ship_classification = Ship_classification::whereIn('id', [$ship_classification_id])->get();
        $Rig_type = Rig_type::whereIn('id', [$rig_type_id])->get();
        $Operation = Operation::whereIn('id', [$operation_id])->get();

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Hello World </h1>');
        if ($certificate_type == 1) {
            $file = 'certificate/certificate-1onwership';
        }
        if ($certificate_type == 2) {
            $file = 'certificate/certificate-2philreg';
        }
        if ($certificate_type == 3) {
            $file = 'certificate/certificate-3Bay';
        }
        if ($certificate_type == 4) {
            $file = 'certificate/certificate-4Coastwise';
        }
        if ($certificate_type == 5) {
            $file = 'certificate/certificate-5OwnershipRecreational';
        }
        if ($certificate_type == 6) {
            $file = 'certificate/certificate-6RecreationBoat';
        }
        if ($certificate_type == 7) {
            $file = 'certificate/certificate-7Fishing';
        }
        if ($certificate_type == 8) {
            $file = 'certificate/certificate-8CargoSafetyVessel';
        }
        if ($certificate_type == 9) {
            $file = 'certificate/certificate-9Permit';
        }
        if ($certificate_type == 10) {
            $file = 'certificate/certificate-10Tonnage';
        }
        if ($certificate_type == 11) {
            //$file = 'certificate/certificate-11Minimun';
            return redirect('co_cpr');
        }
        if ($certificate_type == 12) {
            $file = 'certificate/certificate-12ChangeEngine';
        }
        if ($certificate_type == 13) {
            $file = 'certificate/certificate-13ChangeVesselName';
        }
        if ($certificate_type == 14) {
            $file = 'certificate/certificate-14Inspection';
        }
        if ($certificate_type == 15) {
            $file = 'certificate/certificate-15PublicConvience';
        }
        if ($certificate_type == 16) {
            $file = 'certificate/certificate-16Stability';
        }
        if ($certificate_type == 17) {
            $file = 'certificate/certificate-17RollBack';
        }
        if ($certificate_type == 18) {
            $file = 'certificate/certificate-18ChangeHomePort';
        }
        if ($certificate_type == 19) {
            $file = 'certificate/certificate-19Compliance';
        }
        if ($certificate_type == 20) {
            $file = 'certificate/certificate-20PublicConvience';
        }
        if ($certificate_type == 21) {
            $file = 'certificate/certificate-21FVSC';
        }
        if ($certificate_type == 22) {
            $file = 'certificate/certificate-22MotorboutLicense';
        }
        if ($certificate_type == 23) {
            $file = 'certificate/certificate-23ORDER';
        }
        if ($certificate_type == 24) {
            $file = 'certificate/certificate-24Passenger';
        }
        if ($certificate_type == 25) {
            $file = 'certificate/certificate-25PleasureYachtLicense';
        }
        
        $pdf = Pdf::loadView($file, compact('Details'), [
            'certificate' => $certificate,
            'amount' => $amount,
            'or_number' => $or_number,
            'or_date' => $or_dates,
            'ship_type' => $Ship_type,
            'trading_area' => $Trading_area,
            'hull_material' => $Hull_material,
            'stem_type' => $Stem_type,
            'stern_type' => $Stern_type,
            'ship_classification' => $Ship_classification,
            'no' => $no,
            'ship_propulsion' => $ship_propulsion,
            'results' => $results,
            'rig_type' => $Rig_type,
            'operation' => $Operation,
            'license_no' => $license_no,
            'office_place' => $Office_place,
            'date_issued' => $date_issued,
            'date_issue' => $date_issue,
            'valid_date' => $valid_date,
            'date_validity' => $date_validity,
            'qrCodeImagePath' => $tempImagePath,
        ])->setPaper('legal');
        return $pdf->stream('pdf_with_qr_code.pdf');
    }
}
