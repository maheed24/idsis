<?php

namespace App\Http\Controllers;

use App\Models\Certificate_license;
use App\Models\Detail;
use App\Models\Image;
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
            $image = Image::where('detail_id',$detail_id)->get();
           // $path = $image->path;
          
          
            return view('view-detail.index')->with('Detail', $Details)
                                            ->with('image',$image)
                                            
                                            ->with('certificate',$certificate);
        } catch (ModelNotFoundException $e) {
            abort(404); // Throw a 404 (Not Found) exception
        }
      
    }
}
