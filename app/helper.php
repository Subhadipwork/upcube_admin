<?php

use App\Models\OrderList;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCompletedMail;
if (!function_exists('is_product_in_cart')) {
    function is_product_in_cart($productId) {
        $cartContents = Gloudemans\Shoppingcart\Facades\Cart::content();
        return $cartContents->contains('id', $productId);
    }
}




if (!function_exists('checkCartStock')) {
    function checkCartStock($cartContent) {
        foreach ($cartContent as $item) {
            $product = Product::find($item->id);
            if ($product && $product->quantity <= $item->qty) {
                return false;
            }
        }
        return true;
    }
}
if (!function_exists('checkProductStock')) {
    function checkProductStock($productId) {
        
            $product = Product::find($productId);
            if ($product && $product->quantity <= 0) {
                return false;
            }
       
        return true;
    }
}

if (!function_exists('emailSend')) {
    function emailSend( $order) {
     $order=OrderList::with('orderproduct')->find($order);
    // dd($order->email);
    $maildata = [
        'subject' => 'Order Completed',
        'order' => $order

    ];

    Mail::to($order->email)->send(new OrderCompletedMail($maildata));    
    }
}