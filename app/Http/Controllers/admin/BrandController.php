<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.createbrand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'name' => 'required|unique:brands'
        ]);
        $brand = new Brand();
        $brand->name = $request->name;
         $brand->status = $request->status;
        $brand->save();
        
        return redirect()->back()->with('success', 'Brand created successfully');
    }
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate(Brand::rules());
    
    //     $brand = Brand::create($validatedData);
    
    //     return redirect()->back()->with('success', 'Brand created successfully');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $brand = Brand::find($id);
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

    public function updateStatus(Request $request){
        $brand = Brand::findorFail($request->id);
        $brand->status = $request->status;
        $brand->save();
       return response()->json([
           'status' => true,
           'message' => 'Status updated successfully!',
       ]);
    }
}
