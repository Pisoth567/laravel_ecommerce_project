<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'home'])->name('index');
Route::get('/product_detail/{id}', [UserController::class, 'productDetail'])->name('product_detail');
Route::get('/viewallproduct', [UserController::class, 'allProducts'])->name('viewallproduct');

Route::get('/dashboard', [UserController::class , "index"])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/addtocard/{id}', [UserController::class , "addToCard"])->middleware(['auth', 'verified'])->name('add_to_card');
Route::get('/removecartproduct/{id}', [UserController::class , "removeCartProduct"])->middleware(['auth', 'verified'])->name('removecartproduct');

// comfirm Order
Route::post('/comfirm_order', [UserController::class , "comfirmOrder"])->middleware(['auth', 'verified'])->name('comfirm_order');

Route::get('/cartproducts', [UserController::class , "cartProducts"])->middleware(['auth', 'verified'])->name('cartproducts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('/add_category', [AdminController::class, 'addCategory'])->name('admin.addcategory');
    Route::post('/add_category', [AdminController::class, 'postAddCategory'])->name('admin.post_add_category');
    Route::get('/view_category', [AdminController::class, 'viewCategory'])->name('admin.viewcategory');
    Route::get('/delete_category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deletecategory');
    Route::get('/update_category/{id}', [AdminController::class, 'updateAddCategory'])->name('admin.updatecategory');
    Route::post('/post_add_category/{id}', [AdminController::class, 'postUpdateCategory'])->name('admin.postupdatecategory');
    Route::get('/add_product', [AdminController::class, 'addProduct'])->name('admin.addproduct');
    Route::post('/add_product', [AdminController::class, 'postAddProduct'])->name('admin.postaddproduct');
    Route::get('/view_product', [AdminController::class, 'viewProduct'])->name('admin.view_product');
    Route::get('/delete_product/{id}', [AdminController::class, 'deleteProduct'])->name('admin.deleteproduct');
    Route::get('/update_product/{id}', [AdminController::class, 'updateProduct'])->name('admin.updateproduct');
    Route::get('/vieworders', [AdminController::class, 'viewOrders'])->name('admin.vieworders');
    
    Route::post('/change_status/{id}', [AdminController::class, 'changeStatus'])->name('admin.change_status');
    
    Route::get('/downloadpdf/{id}', [AdminController::class, 'downloadPDF'])->name('admin.downloadpdf');
});
 
require __DIR__.'/auth.php';
