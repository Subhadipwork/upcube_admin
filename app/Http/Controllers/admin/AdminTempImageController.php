<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TempImage;
// use Image;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;



class AdminTempImageController extends Controller
{
    public function store(Request $request)
    {
        // return $request;
        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $fileName = time() . '.' . $ext;

                $tempImagesFolder = public_path('temp_images');
                if (!file_exists($tempImagesFolder)) {
                    mkdir($tempImagesFolder, 0755, true);
                }

                $image->move($tempImagesFolder, $fileName);

                $tempImage = new TempImage();
                $tempImage->name = $fileName;
                $tempImage->save();

                // create tempimage
                $sourcePath = public_path('temp_images/' . $fileName);
                $destFolder = public_path('temp_images/thumb/');
                $destPath = $destFolder . $fileName;
            
                if (!file_exists($destFolder)) {
                    mkdir($destFolder, 0755, true);
                }
            
                $image = Image::make($sourcePath);
                $image->fit(300, 275);
                $image->save($destPath);
            
                
                // return $destFolder;
                return response()->json([
                'status' => true,
                'image' => $fileName,
                'image_destination' => $destFolder,
                'image_path' => url('/temp_images/thumb/' . $fileName), 
                'image_id' => $tempImage->id]);

            } catch (\Exception $e) {
                return response()->json(['status' => false, 'message' => 'Failed to upload image. Please try again.'], 500);
                Log::error("Failed to upload image: " . $e->getMessage());
            }
        } else {
            return response()->json(['status' => false, 'message' => 'No image provided.'], 400);
        }
    }
}
