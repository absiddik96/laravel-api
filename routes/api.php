<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Buyer
Route::apiResource('buyers', 'Buyer\BuyerController')->only(['index','show']);
// Category
Route::apiResource('categories', 'Category\CategoryController');
// Product
Route::apiResource('products', 'Product\ProductController')->only(['index','show']);
// Seller
Route::apiResource('sellers', 'Seller\SellerController')->only(['index','show']);
// Transaction
Route::apiResource('transactions', 'Transaction\TransactionController')->only(['index','show']);
Route::apiResource('transactions.categories', 'Transaction\TransactionCategoryController')->only(['index']);
Route::apiResource('transactions.sellers', 'Transaction\TransactionSellerController')->only(['index']);
// User
Route::apiResource('users', 'User\UserController');
