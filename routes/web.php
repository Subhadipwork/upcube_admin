<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ProfileController;
// use App\Http\Controllers\AdminTempImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminTempImageController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubCategoryController;
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

// Route::get('/', function () {
//     return view('admin.layouts.layout');
// });

Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {

        // Routes accessible only to guest admin users
        Route::get('',[AdminLoginController::class,'redirect'])->name('admin.redirect');
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
        Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory.index');
        Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
        Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
        // Route::get('/subcategory/status/{id}', [SubCategoryController::class, 'statusupdate'])->name('subcategory.status');
        Route::get('/subcategory/changeStatus/{id}', [SubcategoryController::class, 'changeStatus'])->name('subcategory.status');
        Route::DELETE('/subcategory/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');
        Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
        Route::put('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');

        // product route
        Route::get('/product',[ProductController::class, 'index'])->name('product.index');
        Route::get('/product/create',[ProductController::class, 'create'])->name('product.create');
        Route::post('/product/store',[ProductController::class, 'store'])->name('product.store');


        // tempimage
        
        Route::post('upload-temp-image',[AdminTempImageController::class, 'store'])->name('tempimage.create');


        Route::get('/getSlug',function(Request $request){
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
