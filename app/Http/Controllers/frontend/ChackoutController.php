<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderList;
use App\Models\OrderProduct;
use App\Models\State;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\UserAddress;
use App\Models\ProductStockHistory;
use Illuminate\Foundation\Auth\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ChackoutController extends Controller
{
    public function chackout()
    {
        
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        
        // Check  cart 
        if (Cart::count() <= 0) {
            
            return redirect()->route('frontend.index');
        }
        foreach (Cart::content() as $item) {
            $product = Product::find($item->id); 
            if ($product && $product->quantity <= $item->qty) { 
                return redirect()->back()->with('error', 'One or more products in your cart are out of stock.');
            }
        }


       
        $addresses = UserAddress::where('user_id', Auth::user()->id)->get();
         $states = State::get();
       
        return view('frontend.chackout.index', compact('addresses', 'states'));
    }

    public function store(Request $request){
        // return $request;
       $request->validate([
           'first_name' => 'required|min:3|max:50',
           'last_name' => 'required|min:3|max:50',
           'address' => 'required',
           'city' => 'required',
           'state' => 'required',
           'country' => 'required',
           'pincode' => 'required',
           'phone' => 'required',
           'payment_method' => 'required',
       ]);
       if (!Auth::check()) {
           return redirect()->route('user.login');
       }
       
        $subtotal= Cart::subtotal(2,'.','');
       $grandtotal= Cart::total(2,'.','');
       $invoiceno=$this->generateInvoiceNumber();
       $orderlist= new OrderList();
       $orderlist->user_id = Auth::user()->id;
       $orderlist->invoice_no = $invoiceno;
       $orderlist->subtotal = $subtotal;
       $orderlist->grandtotal = $grandtotal;
       $orderlist->delivery_charge = 0;
       $orderlist->discount_amount = 0;
       $orderlist->discount_type = 0;
       $orderlist->gst = 0;
       $orderlist->status = 'placed';
       $orderlist->name = $request->first_name . ' ' . $request->last_name;
       $orderlist->email = Auth::user()->email;
       $orderlist->phone = $request->phone;
       $orderlist->address = $request->address;
       $orderlist->city = $request->city;
       $orderlist->state = $request->state;
       $orderlist->country = $request->country;
       $orderlist->pincode = $request->pincode;
       $orderlist->landmark = $request->landmark;
       $orderlist->notes = $request->notes;
       $orderlist->payment_method = $request->payment_method;
       $orderlist->payment_status = 'pending';
       $orderlist->transaction_id = null;
       $orderlist->order_date = Carbon::now();
       $ordercreate =$orderlist->save();
       if (!$ordercreate) {
           return redirect()->back()->with('error', 'Something went wrong.');
       }
            foreach (Cart::content() as $key => $value) {
                $orderproduct = new OrderProduct();
                $orderproduct->order_id = $orderlist->id;
                $orderproduct->invoice_no= $orderlist->invoice_no;
                $orderproduct->product_id = $value->id;
                $orderproduct->quantity = $value->qty;
                $orderproduct->product_price = $value->price;
                $orderproduct->total_price = $value->price * $value->qty;
               
                if ($orderproduct->save()) {
                   $product = Product::find($value->id);
                   $product->quantity = $product->quantity - $value->qty;
                   if ($product->save()) {
                       $productstockhistory = new ProductStockHistory();
                       $productstockhistory->product_id = $value->id;
                       $productstockhistory->user_id = Auth::user()->id;
                       $productstockhistory->stock = $value->qty;
                       $productstockhistory->save();
                   }
                }
            }
            Cart::destroy();
            emailSend($orderlist->id);
            return redirect()->route('frontend.index')->with('success', 'Order placed successfully.');
    }


    // private function generateInvoiceNumber()
    // {
    //     $prefix = 'CHA'; 
    //     $date = Carbon::now()->format('Ymd');  
        
    //     $latestInvoice = OrderList::whereDate('created_at', Carbon::today())->latest()->first();
    
    //     if (!$latestInvoice) {
    //         $number = 1;
    //     } else {
    //         $explode = explode('-', $latestInvoice->invoice_number);
    //         $number = (int) end($explode) + 1;

    //     }
    
    //     return $prefix . '-' . $date . '-' . str_pad($number, 5, '0', STR_PAD_LEFT); 
        
    // }
    // private function generateInvoiceNumber() {
    //     $prefix = 'CHA';
    //     $date = Carbon::now()->format('YmdHis');  // Date and time up to seconds
    //     $userId = Auth::user()->id;
    
    //     return $prefix . '-' . $date . '-' . $userId;
    // }


private function generateInvoiceNumber() {
    $prefix = 'CHA';
    $date = Carbon::now()->format('Ymd');

    if (!Cache::has('latest_invoice_number')) {
        Cache::forever('latest_invoice_number', 1);
    }
    
    
    $number = Cache::increment('latest_invoice_number');

    return $prefix.$date.str_pad($number, 5, '0', STR_PAD_LEFT);
}

    
    
    
}
