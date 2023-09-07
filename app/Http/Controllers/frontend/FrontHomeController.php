<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Banner;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index()
    {   
        // $categories= Category::with('products.images')->where('top_category','=','1')
        // ->where('status','1')
        // ->get();
        $categories = Category::with(['products' => function ($query) {
            $query->inRandomOrder()->take(5)->with('images');
        }])
        ->where('top_category', '=', '1')
        ->where('status', '1')
        ->inRandomOrder()
        ->take(5)
        ->get();
        
        $topcategories = Category::with(['products' => function ($query) {
            $query->inRandomOrder()->take(5)->with('images');
        }])
        ->where('top_category', '=', '1')
        ->where('status', '1')
        ->inRandomOrder()
        ->take(5)
        ->get();


        $banners = Banner::get();

        return view('frontend.frontpage.index',compact('categories','banners','topcategories'));
        // return view('frontend.layouts.layout');
    }
}
