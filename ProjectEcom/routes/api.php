<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserAPIController;
use App\Http\Controllers\CategoryAPIController;
use App\Http\Controllers\OrderConotrller;
use App\Http\Controllers\ProductAPIController;
use App\Http\Controllers\ProductCategoryAPIController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// //Get all employess
// Route::get('employees',[EmployeeController::class,'getEmployee']);
// //Get specic employee detail
// Route::get('employee/{id}',[EmployeeController::class,'getEmployeeById']);
// //Add new employee
// Route::post('addEmployee',[EmployeeController::class,'addEmployee']);
// //Update Employee
// Route::put('updateEmployee/{id}',[EmployeeController::class,'updateEmployee']);
// //Delete Employee
// Route::delete('deleteEmployee/{id}',[EmployeeController::class,'deleteEmployee']);

//Get all user 
Route::get('user',[UserAPIController::class,'getUser']);
//Get specic user detail
Route::get('user/{id}',[UserAPIController::class,'getUserById']);
//Add new user
Route::post('addUser',[UserAPIController::class,'addUser']);
//Update user
Route::put('updateUser/{id}',[UserAPIController::class,'updateUser']);
//Delete user
Route::delete('deleteUser/{id}',[UserAPIController::class,'deleteUser']);

//Category
//Get all Category 
Route::get('category',[CategoryAPIController::class,'getCategory']);
//Get specic Category detail
Route::get('category/{id}',[CategoryAPIController::class,'getCategoryById']);
//Add new Category
Route::post('addCategory',[CategoryAPIController::class,'addCategory']);
//Update Category
Route::put('updateCategory/{id}',[CategoryAPIController::class,'updateCategory']);
//Delete Category
Route::delete('deleteCategory/{id}',[CategoryAPIController::class,'deleteCategory']);

//Product
Route::get('product',[ProductAPIController::class,'getProduct']);
//Get specic Category detail
Route::get('product/{id}',[ProductAPIController::class,'getProductById']);
//Add new Category
Route::post('addProduct',[ProductAPIController::class,'addProduct']);
//Update Category
Route::put('updateProduct/{id}',[ProductAPIController::class,'updateProduct']);
//Delete Category
Route::delete('deleteProduct/{id}',[ProductAPIController::class,'deleteProduct']);
//get new product
Route::get('productNewest',[ProductAPIController::class,'getNewestProduct']);
//get increse product
Route::get('increasePriceProduct',[ProductAPIController::class,'getIncreasePriceProduct']);
Route::get('descendingPriceProduct',[ProductAPIController::class,'getDescendingPriceProduct']);
//searchProduct
Route::get('searchProductByName/{name}',[ProductAPIController::class,'searchProductByName']);
Route::get('searchProductByCategory/{categoryName}',[ProductAPIController::class,'searchProductByCategory']);


//order getMostPurchasesProduct
Route::get('mostPurchasesProduct/{orderBy}',[OrderConotrller::class,'getMostPurchasesProduct']);

//Product
Route::get('productCategory',[ProductCategoryAPIController::class,'getProductCategory']);
//Get specic Category detail
Route::get('productCategory/{id}',[ProductCategoryAPIController::class,'getProductCategoryById']);
//Add new Category
Route::post('addProductCategory',[ProductCategoryAPIController::class,'addProductCategory']);
//Update Category
Route::put('updateProductCategory/{id}',[ProductCategoryAPIController::class,'updateProductCategory']);
//Delete Category
Route::delete('deleteProductCategory/{id}',[ProductCategoryAPIController::class,'deleteProductCategory']);

