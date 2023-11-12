<?php

namespace App\Http\Controllers;

use App\Models\Certificate_license;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ViewController extends Controller
{
    public function show(string $token)
    {
        try {
            $certificate = Certificate_license::where('qr_code', $token)->firstOrFail();
            $detail_id = $certificate->details_id;
            $Details = Detail::where('id',[$detail_id])->get();
          
            return view('view-detail.index')->with('Detail', $Details);
        } catch (ModelNotFoundException $e) {
            abort(404); // Throw a 404 (Not Found) exception
        }
      
    }
}
