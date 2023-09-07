<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\Product;

class CartController extends Controller
{
    public function addToCard(Request $request){
        
        $product = Product::with('images')->find($request->id);
        
        if ($product == null){ 
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ]);
        }

     if (Cart::count() > 0){
            $cartContent= Cart::content();
            $productAllreadyexist= false;
            foreach ($cartContent as $cartItem){
                if ($cartItem->id == $product->id){
                    $productAllreadyexist = true;
                }
            }
            if ($productAllreadyexist== false){
                Cart::add($product->id, $product->titel, 1, $product->selling_price, ['Product_image' => ($product->images && $product->images->first()) ? $product->images->first()->image : '']);       
                $status = true;
                $message = $product->titel. ' added to cart';
            }else{
                $status = false;
                $message = $product->titel. ' already added to cart';
            }
        
     }else{
        Cart::add($product->id, $product->titel, 4, $product->selling_price, ['Product_image' => ($product->images && $product->images->first()) ? $product->images->first()->image : '']);
        $status = true;
        $message = $product->titel. ' added to cart';
     }

        
        return response()->json([
            'status' => true,
            'message' => $message
        ]);
    }

    public function cart(){
        return $cartContents = Cart::content();
        // return view('frontend.layouts.layout',compact('cartContents'));
    }

    public function removeFromCart(Request $request){

        

        $removecart=Cart::remove($request->rowId);
        if ($removecart == true) {
            return response()->json([
                'status'=>true,
                'message'=>'remove'
            ]);
        }
        
    }

  
    
}
