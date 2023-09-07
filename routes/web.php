<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\BrandController;
// use App\Http\Controllers\AdminTempImageController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\AdminTempImageController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\TestController;
use App\Http\Controllers\BannerController;

// start froncontroller
use App\Http\Controllers\frontend\AuthController;
use App\Http\Controllers\frontend\FrontHomeController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\frontend\ChackoutController;
// end froncontroller
use App\Models\Product;
use App\Models\ProductVariant;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/test', function () {
    emailSend('15000'); 
});
// Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

Route::get('/', [FrontHomeController::class, 'index'])->name('frontend.index');
// Product
Route::get('/allproduct',[ShopController::class,'allproduct'])->name('allproduct.details');
Route::get('/product/{id}',[ShopController::class,'product'])->name('product.details');

Route::get('/cart',[CartController::class,'cart'])->name('product.cart');
Route::post('/addToCard',[CartController::class,'addToCard'])->name('product.addToCard');
Route::post('/removeFromCart',[CartController::class,'removeFromCart'])->name('product.removeFromCart');

// user
Route::get('/userlogin',[AuthController::class,'login'])->name('user.login');

Route::get('/userregister',[AuthController::class,'register'])->name('user.register');
Route::post('/userregister',[AuthController::class,'registerUser'])->name('user.registerUser');


Route::group(['prefix' => 'user'], function () {

    Route::group(['middleware' => 'guest'], function () {
        // Routes accessible only to guest users
        Route::post('/login', [AuthController::class, 'authenticate'])->name('user.login.authenticate');

    });

    Route::group(['middleware' => 'auth'], function () {
    // // Routes accessible only to authenticated admin users
    Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::get('/user/chackout',[ChackoutController::class,'chackout'])->name('user.chackout');
    Route::post('/user/chackout/store',[ChackoutController::class,'store'])->name('user.chackout.store');


    });
});


Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {

        // Routes accessible only to guest admin users
        Route::get('', [AdminLoginController::class, 'redirect'])->name('admin.redirect');
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/login', [AdminLoginController::class, 'authenticate'])->name('admin.login.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        // Routes accessible only to authenticated admin users
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin_profile', [ProfileController::class, 'profile'])->name('admin.admin_profile');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

        // category round
        Route::resource('category', CategoryController::class);
        Route::post('category/updateStatus', [CategoryController::class, 'updateStatus'])->name('category.updateStatus');

        // SubCategory


        Route::prefix('subcategory')->group(function () {
            Route::get('/', [SubCategoryController::class, 'index'])->name('subcategory.index');
            Route::get('/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
            Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
            // Route::get('/status/{id}', [SubCategoryController::class, 'statusupdate'])->name('subcategory.status');
            Route::get('/changeStatus/{id}', [SubcategoryController::class, 'changeStatus'])->name('subcategory.status');
            Route::get('/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');
            Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
            Route::put('/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
        });



        // product route
        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/getSubcategories', [ProductController::class, 'getSubcategories'])->name('getSubcategory');
        Route::get('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/product/updateStatus', [ProductController::class, 'updateStatus'])->name('product.updateStatus');


        // ProductVariant::observe(ProductVariant::class);
        Route::get('/product/variant/{id}', [ProductController::class, 'variantview'])->name('product.varient');

        // Brand Controller

        Route::resource('brand', BrandController::class);
        Route::post('brand/updateStatus', [BrandController::class, 'updateStatus'])->name('brand.updateStatus');

        // banner Controller
        Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
        Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');
 
        Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::put('/banner/update/{id}', [BannerController::class, 'update'])->name('banner.update');

        // Order section
        Route::get('/order', [OrderController::class, 'index'])->name('order.index');
        Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');

        // discount
        Route::resource('/discount', DiscountController::class);




        // tempimage

        Route::post('upload-temp-image', [AdminTempImageController::class, 'store'])->name('tempimage.create');


        Route::get('/getSlug', function (Request $request) {
            $slug = '';
            if (!empty($request->name)) {
                $slug = Str::slug($request->name);
            }
            return response()->json([
                'status' => true,
                'slug' => $slug
            ]);
        })->name('getSlug');
    });
});
