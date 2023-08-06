<?php

namespace App\Http\Controllers;


use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\TempImage;
// use Image;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
/**
 * Display a listing of the resource.
 */
public function index()
{
    $categories = Category::latest()->paginate(30);
    // $categories = Category::all();
    
    return view('admin.category.list', compact('categories'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.category');
    }


   

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
            'image' => 'required',
        ]);
    
        $category = new Category();
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->save();
    
        if (!empty($validatedData['image'])) {
            $tempImage = TempImage::find($validatedData['image']);
    
            if ($tempImage) {
                $ext = pathinfo($tempImage->name, PATHINFO_EXTENSION);
                $newImageName = $category->id . '.' . $ext;
                $sourcePath = public_path('/temp_images/' . $tempImage->name);
                $destinationDir = public_path('/uploaded/category/');
                $destinationPath = $destinationDir . $newImageName;
    
                // Ensure the destination directory exists
                if (!File::exists($destinationDir)) {
                    File::makeDirectory($destinationDir, 0755, true);
                }
    
                if (File::copy($sourcePath, $destinationPath)) {
                    $category->image = $newImageName;
                    $category->save();
    
                    // Create thumbnail
                    $thumbnailDir = public_path('/uploaded/category/thumbnail/');
                    $thumbnailPath = $thumbnailDir . $newImageName;
    
                    if (!File::exists($thumbnailDir)) {
                        File::makeDirectory($thumbnailDir, 0755, true);
                    }
    
                    $img = Image::make($destinationPath);
                    $img->resize(300, 300);
                    $img->save($thumbnailPath);
                } else {
                    // Log an error or handle the situation if the image could not be copied
                }
            }
        }
    
        return response()->json(['message' => 'Category added successfully!', 'category' => $category]);
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.category.list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        // dd($category);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories,slug,'.$category->id.',id',
            'image' => 'required',
        ]);
      
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->save();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.list')->with('message', 'Category deleted successfully!');
    }
public function updateStatus(Request $request)
{
    $request->validate([
        'id' => 'required|integer',
        'status' => 'required|boolean',
    ]);

    $category = Category::findOrFail($request->id);

    $category->update(['status' => $request->status]);

    return response()->json(
        [
            'status' => true,
            'message' => 'Status updated successfully!',
        ]
    );
}
}
