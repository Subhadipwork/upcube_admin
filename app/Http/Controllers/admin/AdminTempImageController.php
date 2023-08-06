<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TempImage;

class AdminTempImageController extends Controller
{
    public function store(Request $request)
    {
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

                return response()->json(['status' => true, 'image' => $fileName, 'image_id' => $tempImage->id]);
            } catch (\Exception $e) {
                return response()->json(['status' => false, 'message' => 'Failed to upload image. Please try again.'], 500);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'No image provided.'], 400);
        }
    }
}
