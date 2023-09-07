<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class BannerController extends Controller
{
    public function index(){
        $banners = Banner::get();
        return view('admin.banner.index',compact('banners'));
    }
    public function create(){
        return view('admin.banner.create');
    }

    public function store(Request $request){
        
        if (!empty($request->imageArray)) {
            foreach ($request->imageArray as $tempImageid) {
                $tempImageinfo = TempImage::find($tempImageid);
                $extarry = explode('.', $tempImageinfo->name);


                $extension = end($extarry);

                $productImageName = 'banner_image_'. time() .'.' . $extension;

                $bannerImage = new Banner;
             


                // Define the source and destination paths

                $sourcePath = public_path('/temp_images/' . $tempImageinfo->name);
                $destinationDir = public_path('/uploaded/banner_images/');
                $destinationPath = $destinationDir . $productImageName;


                // Ensure the destination directory exists
                if (!file_exists($destinationDir)) {
                    mkdir($destinationDir, 0755, true);
                }

           
                $destinationImagePath = public_path('/uploaded/banner_images/' . $productImageName);

                if (File::copy($sourcePath, $destinationImagePath)) {
                  
                   $bannerImage->image = $productImageName;
                   $bannerImage->save();
                }
                if ($bannerImage) {
                    return redirect()->route('banner.create')->with('success', 'Banner created successfully!');
                }
            }
        }
    }
    public function edit($id){
        $banner = Banner::find($id);
        return view('admin.banner.editbanner',compact('banner'));
    }
    public function update(Request $request,$id){
        $banner = Banner::find($id);
        $banner->update($request->all());
        return redirect()->route('banner.index')->with('success', 'Banner updated successfully!');
    }
}
