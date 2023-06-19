<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\SubSubCategoryController;

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

// ==============Admin Dashboard====================
Route::middleware('auth', 'adminCheck')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

//home
Route::get('/', [HomeController::class, 'home'])->name('home');
//auth
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//lang
Route::get('lang/change', [LangController::class, 'lang_change'])->name('lang.change');

// admin route
Route::prefix('admin')->middleware(['auth', 'adminCheck'])->group(function () {
    //category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.delete');


    //sub category
    Route::get('/sub_category', [SubCategoryController::class, 'index'])->name('sub.index');
    Route::get('/sub_category/create', [SubCategoryController::class, 'create'])->name('sub.create');
    Route::post('/sub_category', [SubCategoryController::class, 'store'])->name('sub.store');
    Route::get('/sub_category/{id}/edit', [SubCategoryController::class, 'edit'])->name('sub.edit');
    Route::put('/sub_category/{id}', [SubCategoryController::class, 'update'])->name('sub.update');
    Route::get('/sub_category/{id}/delete', [SubCategoryController::class, 'destroy'])->name('sub.delete');

    //sub sub category
    Route::get('/sub_sub_category', [SubSubCategoryController::class, 'index'])->name('subsub.index');
    Route::get('/sub_sub_category/create', [SubSubCategoryController::class, 'create'])->name('subsub.create');
    Route::post('/sub_sub_category', [SubSubCategoryController::class, 'store'])->name('subsub.store');
    Route::get('/sub_sub_category/{id}/edit', [SubSubCategoryController::class, 'edit'])->name('subsub.edit');
    Route::put('/sub_sub_category/{id}', [SubSubCategoryController::class, 'update'])->name('subsub.update');
    Route::get('/sub_sub_category/{id}/delete', [SubSubCategoryController::class, 'destroy'])->name('subsub.delete');

    //sub sub category
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/getSubcategories/{category_id}', [ProductController::class, 'getSubcategories'])->name('getSubcategories');
    Route::get('/getSubSubcategories/{sub_category_id}', [ProductController::class, 'getSubSubcategories'])->name('getSubSubcategories');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/{id}/delete', [ProductController::class, 'destroy'])->name('product.delete');

});
