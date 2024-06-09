<?php

use App\Http\Controllers\backend\AdminNewsController;
use App\Http\Controllers\backend\ActivityController;
use App\Http\Controllers\backend\AdminController;

use App\Http\Controllers\backend\AdminProductController;
use App\Http\Controllers\backend\CategoryController;


use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\frontend\productController;
use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\frontend\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',        [HomeController::class, 'index']);

Route::get('/shop',    [ShopController::class, 'shop']);


Route::get('/product-detail/{id}', [productController::class, 'productDetail']);

Route::get('/search', [SearchController::class, 'search']);

Route::get('/news', [NewsController::class, 'news']);
Route::get('/news-detail={id}', [NewsController::class, 'NewsDetail']);



// @Backend


Route::get('/signin', [AdminController::class, 'signin'])->name('login');
Route::post('/signin-submit', [AdminController::class, 'signinSubmit']);

Route::get('/signup',         [AdminController::class, 'signup']);
Route::post('/signup-submit', [AdminController::class, 'signupSubmit']);


Route::middleware(['auth'])->group(function () {

Route::get('/admin', [AdminController::class, 'index']);

// @ logout
Route::get('/admin/logout', [AdminController::class, 'UserLogout']);

// * Website logo
// List logo
Route::get('/admin/list-logo' , [AdminController::class , 'ListLogo'])->name('list-logo');
// add logo



Route::get('/admin/add-logo' , [AdminController::class , 'addLogo'] );
Route::post('/admin/add-logo-submit' , [AdminController::class , 'addLogoSubmit'] );
// edit
Route::get('/admin/edit-logo/{id}' , [AdminController::class , 'EditLogo'] );
Route::post('/admin/edit-logo-submit' , [AdminController::class , 'EditLogoSubmit'] );

// remove
Route::get('/admin/remove-logo/{id}' , [AdminController::class , 'RemoveLogo'] );
Route::post('/admin/remove-logo-submit' , [AdminController::class , 'RemoveLogoSubmit'] );


// product
Route::get('/admin/list-product' , [AdminProductController::class , 'ListProduct'] );
// product
Route::get('/admin/add-product' , [AdminProductController::class , 'AddProduct'] );
Route::post('/admin/add-product-submit' , [AdminProductController::class , 'AddProductSubmit'] );


// views
Route::get('/admin/view-product={id}' , [AdminProductController::class , 'ViewProduct'] );

// edit
Route::get('/admin/edit-product={id}' , [AdminProductController::class , 'EditProduct'] );
Route::post('/admin/edit-product-submit' , [AdminProductController::class , 'EditProductSubmit'] );


// remove
Route::get('/admin/remove-product={id}' , [AdminProductController::class , 'RemoveProduct'] );
Route::post('/admin/remove-product-submit' , [AdminProductController::class , 'RemoveProductSubmit'] );
// end of product
 
// Category

// list
Route::get('/admin/list-category',            [CategoryController::class, 'ListCategory']); 
// add
Route::get('/admin/add-category',            [CategoryController::class, 'AddCategory']); 
Route::post('/admin/add-category-submit',            [CategoryController::class, 'AddCategorySubmit']);


//edit
Route::get('/admin/edit-category={id}',            [CategoryController::class, 'EditCategory']); 

Route::post('/admin/edit-category-submit',            [CategoryController::class, 'EditCategorySubmit']); 

// remove-category
Route::get('/admin/remove-category={id}',            [CategoryController::class, 'removeCategory']); 

Route::post('/admin/remove-category-submit',            [CategoryController::class, 'removeCategorySubmit']); 

//end of Category


//Activity
Route::get('/admin/log-activity/{page}',            [ActivityController::class, 'ListActivity']); 

//Activity Search
Route::get('/admin/log-activity/1/search',            [ActivityController::class, 'search']); 

//news
Route::get('/admin/list-news',               	 [AdminNewsController::class, 'ListNews']);
// add news
Route::get('/admin/add-news',               	 [AdminNewsController::class, 'AddNews']); 
Route::post('/admin/add-news-submit',            [AdminNewsController::class, 'AddNewsSubmit']); 
// remove news
Route::get('/admin/remove-news={id}',               	 [AdminNewsController::class, 'removeNews']); 
Route::post('/admin/remove-news-submit',            [AdminNewsController::class, 'removeNewsSubmit']); 

// edit news
Route::get('/admin/edit-news={id}',               	 [AdminNewsController::class, 'editNews']); 
Route::post('/admin/edit-news-submit',            [AdminNewsController::class, 'editNewsSubmit']); 

});



