<?php

use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiSubCategoryController;
use App\Http\Controllers\Api\ApiSubSubCategoryController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/auth/registration', [RegisterController::class, 'register']);
Route::post('/auth/login', [RegisterController::class, 'login']);

//category
Route::get('/category', [ApiCategoryController::class, 'index'])->name('category.index')->middleware('auth:sanctum');
Route::post('/category', [ApiCategoryController::class, 'store'])->name('category.store')->middleware('auth:sanctum');
Route::get('/category/{id}/edit', [ApiCategoryController::class, 'edit'])->name('category.edit')->middleware('auth:sanctum');
Route::put('/category/{id}', [ApiCategoryController::class, 'update'])->name('category.update')->middleware('auth:sanctum');
Route::get('/category/{id}/delete', [ApiCategoryController::class, 'destroy'])->name('category.delete')->middleware('auth:sanctum');

//sub category
Route::get('/sub_category', [ApiSubCategoryController::class, 'index'])->name('sub.index')->middleware('auth:sanctum');
Route::get('/sub_category/create', [ApiSubCategoryController::class, 'create'])->name('sub.create')->middleware('auth:sanctum');
Route::post('/sub_category', [ApiSubCategoryController::class, 'store'])->name('sub.store')->middleware('auth:sanctum');
Route::get('/sub_category/{id}/edit', [ApiSubCategoryController::class, 'edit'])->name('sub.edit')->middleware('auth:sanctum');
Route::put('/sub_category/{id}', [ApiSubCategoryController::class, 'update'])->name('sub.update')->middleware('auth:sanctum');
Route::get('/sub_category/{id}/delete', [ApiSubCategoryController::class, 'destroy'])->name('sub.delete')->middleware('auth:sanctum');


//sub sub category
Route::get('/sub_sub_category', [ApiSubSubCategoryController::class, 'index'])->name('subsub.index')->middleware('auth:sanctum');
Route::get('/sub_sub_category/create', [ApiSubSubCategoryController::class, 'create'])->name('subsub.create')->middleware('auth:sanctum');
Route::post('/sub_sub_category', [ApiSubSubCategoryController::class, 'store'])->name('subsub.store')->middleware('auth:sanctum');
Route::get('/sub_sub_category/{id}/edit', [ApiSubSubCategoryController::class, 'edit'])->name('subsub.edit')->middleware('auth:sanctum');
Route::put('/sub_sub_category/{id}', [ApiSubSubCategoryController::class, 'update'])->name('subsub.update')->middleware('auth:sanctum');
Route::get('/sub_sub_category/{id}/delete', [ApiSubSubCategoryController::class, 'destroy'])->name('subsub.delete')->middleware('auth:sanctum');

//product
Route::get('/product', [ApiProductController::class, 'index'])->name('product.index')->middleware('auth:sanctum');
Route::get('/product/create', [ApiProductController::class, 'create'])->name('product.create')->middleware('auth:sanctum');
Route::post('/product', [ApiProductController::class, 'store'])->name('product.store')->middleware('auth:sanctum');
Route::get('/product/{id}/edit', [ApiProductController::class, 'edit'])->name('product.edit')->middleware('auth:sanctum');
Route::put('/product/{id}', [ApiProductController::class, 'update'])->name('product.update')->middleware('auth:sanctum');
Route::get('/product/{id}/delete', [ApiProductController::class, 'destroy'])->name('product.delete')->middleware('auth:sanctum');
