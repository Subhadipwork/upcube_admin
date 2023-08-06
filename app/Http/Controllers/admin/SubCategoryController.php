<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;


class SubCategoryController extends Controller
{
    
    public function index(){
        $subcategories= Subcategory::with('category')->get();
        return view('admin.subcategory.index',compact('subcategories'));
    }
    public function create(){
        $categories= Category::all();

        return view('admin.subcategory.create',compact('categories'));
    }


    public function store(Request $request) {
        // Validate the incoming request data
        $validated = $request->validate([
            'category'=>'required',
            'name'=>'required',
            'status'=>'required|in:1,0',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->status = $request->status;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file('image')->storeAs('public/uploaded/subcategory', $filename);
            $subcategory->image = $filePath;
        }
    
        if($subcategory->save()) {
            return redirect()->back()->with('success', 'Subcategory created successfully');
        } else {
            return redirect()->back()->with('error', 'Error occurred while creating the subcategory. Please try again later.');
        }
    }
    
    public function changeStatus( $id){
        
        $subcategories = Subcategory::find($id);
        $subcategories->status = $subcategories->status == '1' ? '0' : '1';
         $subcategories->save();
        
        return redirect()->back()->with('success', 'Subcategory status updated successfully');
       

    }
    public function edit($id){
        $subcategory = Subcategory::findorFail($id);
        $categories= Category::all();
        return view('admin.subcategory.edit',compact('subcategory','categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category' => 'required',
            'name' => 'required',
            'status' => 'required|in:1,0',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        // Retrieve the subcategory or fail if not found
        $subcategory = Subcategory::findOrFail($id);
    
        $subcategory->category_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->status = $request->status;
    
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if exists
            Storage::delete('public/uploaded/subcategory/' . $subcategory->image);
            
            // Store the new image
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $filepath = $request->image->storeAs('public/uploaded/subcategory', $filename);
    
            $subcategory->image = $filename;
        }
    
        // Save the subcategory and return to the previous page
        if ($subcategory->save()) {
            return redirect()->back()->with('success', 'Subcategory updated successfully');
        } else {
            return redirect()->back()->with('error', 'Error occurred while updating the subcategory. Please try again later.');
        }
    }
    


    public function destroy($id){
        $subcategory = Subcategory::findorFail($id);
        $subcategory->delete();
        return redirect()->back()->with('success', 'Subcategory deleted successfully');
    }

    
}
