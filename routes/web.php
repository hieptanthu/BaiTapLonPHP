<?php

use App\Http\Controllers\adminControler;
use App\Http\Controllers\categoryControler;
use App\Http\Controllers\ordersControler;
use App\Http\Controllers\product_detailsControler;
use App\Http\Controllers\productControler;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\homeController;

use App\Models\orders;
use App\Models\product;
use App\Models\product_details;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('user.index');
// });

Route::get('/Product/search', [productControler::class, 'search'])->name('Product.search');
Route::get('/Product/add-Card/', [homeController::class, 'addCart'])->name('addCart');
Route::get('/Product_details{productId}', [product_detailsControler::class ,'index'])->name('Product_details.index');

Route::put('/product-detail{id}', [ product_detailsControler::class ,'update'])->name('Product_detail.update');
Route::resource('/Product_details', product_detailsControler::class );
Route::get('/admin2', [adminControler::class , 'index'])->name('admin');
Route::resource('/oders', ordersControler::class );

Route::get('/', function () {
    
    return view("admin.index");
});

Route::resource('/homes', homeController::class );
Route::get('/TimKiem/{id}', [homeController::class ,'products'])->name('timkiem');
Route::get('/Category/products/{id}', [homeController::class ,'productsCategory'])->name('CategoryProduct');
Route::get('/products/{id}', [homeController::class ,'product'])->name('product');
Route::get('/cart', [homeController::class ,'ShowCard'])->name('ShowCard');
Route::get('/cart/update/{id}', [homeController::class ,'updateCart'])->name('updateCard');
Route::get('/cart/delete/{id}', [homeController::class ,'deleteCart'])->name('deleteCard');


Route::match(['get', 'post'], '/product-detail', [product_detailsControler::class, 'store'])->name('Product_detail.store');

// Route::post('/product-detail', [ product_detailsControler::class ,'store'])->name('Product_detail.store');
// Route::post('/product-detail{id}', [product_detailsControler::class ,'store'])->name('Product_detail.store');


// thanh toán 
Route::get('/thanhToan', [homeController::class ,'VaoThanhToan'])->name('VaoThanhToan');
Route::post('/thanhToan1', [homeController::class ,'ThanhToan'])->name('ThanhToan');
Route::resource('/oder', ordersControler::class );

;

Route::middleware(['auth', 'verified','Admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/register', [RegisteredUserController::class, 'register'])->name('register.register');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/Category/offCategory{id}', [categoryControler::class, 'offCategory'])->name('Category.offCategory');
    Route::put('/Product/OnAndOffproduct{id}', [productControler::class, 'OnAndOffproduct'])->name('Product.OnAndOffproduct');
    Route::resource('/Category', categoryControler::class );
    Route::get('/aa',[categoryControler::class, 'index'])->name('Category.index');
    Route::resource('/Product', productControler::class );
   
    
});


Route::get('/example', function () {
    
    return response()->json(['message' => 'This is an example API endpoint']);
});


require __DIR__.'/auth.php';
