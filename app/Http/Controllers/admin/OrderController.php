<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        // $orderlists=OrderList::cursorPaginate(10);
        return $orderlists=OrderList::latest()->paginate(300);
        return view('admin.order.index',compact('orderlists'));
    }

    public function show($id){
        // echo $id;

        return $orderlist=OrderList::with('orderProducts.product.productImages')->where('id', $id)->first();;
        // return view('admin.order.show',compact('orderlist'));
    }
}
