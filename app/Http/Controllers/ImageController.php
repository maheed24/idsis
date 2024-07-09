<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image as InterventionImage;

class ImageController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:6120' // Validation rule for images
        // ]);
        
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
        //$input['images'] = implode(',', $input['images']);



        return redirect('co_cpr')->with('flash_message', 'NEW VESSEL HAS BEEN ADDED');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
