<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function allproduct(){

        $products= Product::with('images')->simplePaginate(12);
        // return $products;
        return view('frontend.allproduct.index',compact('products'));
    }

    public function product($id){
        $product =Product::with('images')
        ->where('id',$id)
        ->first();
       
        return view('frontend.singleproduct.index',compact('product'));


    }
    public function removeFromCart(Request $request){
        // Cart::remove($request->rowId);
        
    }
    
}
