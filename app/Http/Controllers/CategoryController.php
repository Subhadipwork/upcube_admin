<?php

namespace App\Http\Controllers;


use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
/**
 * Display a listing of the resource.
 */
public function index()
{
    $categories = Category::latest()->paginate(10);
    
    return view('admin.layouts.category.list', compact('categories'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.category.category');
    }

public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|unique:categories',
        'slug' => 'required|unique:categories',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
    }else{

    $category = new Category();
    $category->name = $request->name;
    $category->slug = $request->slug;
    $category->save();
    
    return redirect()->back()->with('success', 'Category added successfully!');
    
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.layouts.category.list');
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
public function updateStatus(Request $request)
{
    $request->validate([
        'id' => 'required|integer',
        'status' => 'required|boolean',
    ]);

    $category = Category::findOrFail($request->id);

    $category->update(['status' => $request->status]);

    return response()->json(['success' => 'Category status updated successfully']);
}
}
