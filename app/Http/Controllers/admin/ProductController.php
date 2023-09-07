<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\TempImage;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category','subcategory','getbrand','images','variant'])->latest()->paginate(10);
        // return $products;
       return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        $brands = Brand::all();
        return view('admin.product.createproduct', compact('categories', 'brands', 'units'));
    }

    public function store(Request $request)
    {

        // return $request;
        $messages = [
            'selling_price.lte' => 'The selling price should not exceed the MRP or list price.',
       
        ];
        $rules = [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'titel' => 'required',
            'slug' => 'required',
            'price' => 'required|numeric|min:1',
            'selling_price' => 'required|numeric|min:1|lte:price',
            'description' => 'required',
            'sku' => 'required',
            'track_stock' => 'required|in:1,0',
        ];
        if ($request->input('track_stock') == '1') {
            $rules['quantity'] = 'required|integer';
        }
        $validatedData = $request->validate($rules, $messages);

        try {
           
            $product = new Product;

            $product->category_id = $validatedData['category_id'];
            $product->subcategory_id = $validatedData['subcategory_id'];
            $product->titel = $validatedData['titel'];
            $product->slug = $validatedData['slug'];
            $product->price = $validatedData['price'];
            if ($request->has('brand_id')) {
                $product->brand_id = $request->brand_id;
            }
            $product->selling_price = $validatedData['selling_price'];
            $product->description = $validatedData['description'];
            $product->sku = $validatedData['sku'];
            $product->barcode = $request->bar_code;
            $product->track_stock = $validatedData['track_stock'];

            if (isset($validatedData['quantity'])) {
                $product->quantity = $validatedData['quantity'];
            }
         
            if ($product->save()) {
                if (!empty($request->varient) && is_array($request->varient)) {
                    foreach ($request->varient as $key => $value) {
                        // Check if all values in the current variant are null
                        $allNull = true;
                        foreach ($value as $val) {
                            if ($val !== null) {
                                $allNull = false;
                                break;
                            }
                        }
                        
                        if (!$allNull) {
                            $productVariant = new ProductVariant;
                            $productVariant->product_id = $product->id;
                            $productVariant->quantity_per = $value['quantity_per'];
                            $productVariant->unit = $value['unit'];
                            $productVariant->varient_price = $value['varient_price'];
                            $productVariant->varient_selling_price = $value['varient_selling_price'];
                            $discountAmount = $value['varient_price'] - $value['varient_selling_price'];
                            $discountPercentage = round(($discountAmount / $value['varient_price']) * 100, 2);
                            $productVariant->varient_discount=$discountPercentage;
                            $productVariant->varient_stock = $value['varient_stock'];
                            $productVariant->save();
                        }
                    }
                }
            }

            if (!empty($request->imageArray)) {
                foreach ($request->imageArray as $tempImageid) {
                    $tempImageinfo = TempImage::find($tempImageid);
                    $extarry = explode('.', $tempImageinfo->name);


                    $extension = end($extarry);

                    $productImageName = 'product_image_' . $product->id . '_' . time() . '.' . $extension;

                    $productImage = new ProductImage;
                    $productImage->product_id = $product->id;


                    // Define the source and destination paths

                    $sourcePath = public_path('/temp_images/' . $tempImageinfo->name);
                    $destinationDir = public_path('/uploaded/product_images/');
                    $destinationPath = $destinationDir . $productImageName;


                    // Ensure the destination directory exists
                    if (!file_exists($destinationDir)) {
                        mkdir($destinationDir, 0755, true);
                    }

                    // Copy the image from source to destination
                    $destinationImagePath = public_path('/uploaded/product_images/' . $productImageName);

                    if (File::copy($sourcePath, $destinationImagePath)) {
                        $productImage->image = $productImageName;
                        $productImage->save();
                    }
                }
            }




            return redirect()->route('product.create')->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            Log::error("Error creating product: " . $e->getMessage());


            return redirect()->back()->withInput()->with('error', 'Failed to create product. Please try again.');
        }
    }

    public function getSubcategories(Request $request)
    {
        //  return $request;

        $subcategories = Subcategory::where('category_id', $request->category_id)->pluck('name', 'id');
        return response()->json([
            'status' => true,
            'subcategories' => $subcategories
        ]);
    }

    public function variantview($id){
        $variants = ProductVariant::join('products', 'product_variants.product_id', '=', 'products.id')
        ->where('product_variants.product_id', 24)
        ->select('products.titel', 'product_variants.*')
        ->get();
        return view('admin.productvariant.list', compact('variants'));
    }


    public function updateStatus(Request $request){
        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found!'
            ], 404);
        }
        if ($request->type == 'is_featured') {

           $product->is_featured = $product->status == '1' ? '0' : '1';
        }elseif ($request->type == 'status') {
            $product->status = $product->status == '1' ? '0' : '1';
        }
    //    return $product;
        $product->save();
        return response()->json([
            'status'=> true,
            'message'=>'Product Status Changed'
        ]);
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        
        if ($product) {
            $product->delete();
            if ($product->delete()) {
                $productImages = ProductImage::where('product_id', $id)->get();
                foreach ($productImages as $productImage) {
                   
                    $imagePath = public_path('uploaded/product_images/' . $productImage->image);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }

                // Delete the image records from the database
                ProductImage::where('product_id', $id)->delete();
                }
            }
            return redirect()->back()->with('success', 'Product deleted successfully!');
        }
        
        return redirect()->back()->with('error', 'Product not found!');
    }
    public function edit($id){
        $product = Product::with(['images','variant'])->find($id);
        $categories = Category::get();
        $subcategories = Subcategory::where('category_id', $product->category_id)->get();
        $units = Unit::get();
        $brands = Brand::get();
        // return $product;
        return view('admin.product.edit', compact('product', 'categories', 'units', 'brands', 'subcategories'));
    }
    
}
