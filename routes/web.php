<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\typeProductsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Collection;
use App\Models\product;
use App\Models\type_product;
use App\Models\type_products;
use App\Models\Usser;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});
//layout
Route::get('baseView',[mainController::class,'baseView'])->name('base_view');
Route::get('mainView',[mainController::class,'mainView'])->name('main_view');
//user
Route::get('register',[UserController::class,'register'])->name('register');
Route::post('check/register',[UserController::class,'Store_register'])->name ('check_register');
Route::get('login',[UserController::class,'login'])->name('login');
Route::post('check/login',[UserController::class,'check_login'])->name('check_login');
Route::get('logout',[UserController::class,'logout'])->name('logout');
Route::get('admin-page',[UserController::class,'admin'])->name('admin-page');
//type_product
Route::group(['prefix'=>'admin/type_product'],function () {
    Route::get('create',[typeProductsController::class,'create'])->name('typeproduct_create');
    Route::post('add',[typeProductsController::class,'add'])->name('typeproduct_add');
    Route::get('read',[typeProductsController::class,'read'])->name('typeproduct_read');
    Route::get('detail/{id}',[typeProductsController::class,'getbyID'])->name('typeproduct_detail');
    Route::get('edit/{id}',[typeProductsController::class,'editform'])->name('typeproduct_editform');
    Route::post('changeEdit',[typeProductsController::class,'edit'])->name('typeproduct_edit');
    Route::get('delete/{id}',[typeProductsController::class,'delete'])->name('typeproduct_delete');
});
//product
Route::group(['prefix' => 'admin/product'],function(){
    Route::get('create',[ProductController::class,'create'])->name('product_create');
    Route::post('add',[ProductController::class,'add'])->name('product_add');
    Route::get('read',[ProductController::class,'read'])->name('product_read');
    Route::get('edit/{id}',[ProductController::class,'editform'])->name('product_editform');
    Route::post('changeEdit',[ProductController::class,'edit'])->name('product_edit');
    Route::get('addPhotos/{id}',[ProductController::class ,'addPhotos'])->name('product_addPhotos');
    Route::post('storePhotos',[ProductController::class, 'storePhotos'])->name('product_storePhotos');  
    Route::get('delete/{id}',[ProductController::class,'delete'])->name('product_delete');
});
// Cart Shopping
Route::get('AddCart/{id}',[CartController::class,'Add_cart'])->name('add_cart');
Route::get('DeleteCart/{id}',[CartController::class,'DeleteItems_Cart'])->name('delete_cart');
Route::get('ListCart',[CartController::class,"List_Cart"])->name("list_cart");
Route::get('DeleteListCart/{id}',[CartController::class,'DeleteListItems_Cart'])->name('deletList_cart');
Route::get('EditListCart/{id}/{quanty}',[CartController::class,'EditListItems_Cart'])->name('editList_cart');
Route::get('checkout',[CartController::class,'checkout'])->name('checkout');
Route::post('check/checkout',[CartController::class,'check_checkout'])->name('check_checkout')->middleware('UserMiddleware');
// Autocomplete Typehead
Route::get('autocomplete',[ProductController::class,'autocomplete'])->name('autocomplete');
Route::get('product/{slug}',[ProductController::class,'slugView'])->name('product/{slug}');
// price classify
Route::get('price-classify',[ProductController::class,'classify'])->name('classify');
// search
Route::get('searchProduct',[ProductController::class,'searchProduct'])->name('searchProduct');
// collection ps5
Route::get('collection/may-ps-5',function(){
    $data = DB::table('products')->join('type_products','products.id_type','=','type_products.id')
                                 ->where([
                                     ['type_products.name',"PlayStation5"],
                                     ['products.classification',"máy"]
                                 ])
                                 ->select('products.*','type_products.name as type')
                                 ->get();
    $img = 'may-ps-5.jpg';
    return view('typeproductDetails',compact('data','img'));
});
Route::get('collection/game-ps-5',function(){
    $data = DB::table('products')->join('type_products','products.id_type','=','type_products.id')
                                 ->where([
                                     ['type_products.name',"PlayStation5"],
                                     ['products.classification',"game"]
                                 ])
                                 ->select('products.*','type_products.name as type')
                                 ->get();
    $img = 'game-ps-5.jpg';
    return view('typeproductDetails',compact('data','img'));
  
});
Route::get('collection/phukien-ps-5',function(){
    $data = DB::table('products')->join('type_products','products.id_type','=','type_products.id')
                                 ->where([
                                     ['type_products.name',"PlayStation5"],
                                     ['products.classification',"phụ kiện"]
                                 ])
                                 ->select('products.*','type_products.name as type')
                                 ->get();
    $img ='phukien-ps-5.jpg';
    return view('typeproductDetails',compact('data','img'));  
});
//collecttion ps4
Route::get('collection/may-ps-4',function(){
    $data = DB::table('products')->join('type_products','products.id_type','=','type_products.id')
                                 ->where([
                                     ['type_products.name',"PlayStation4"],
                                     ['products.classification',"máy"]
                                 ])
                                 ->select('products.*','type_products.name as type')
                                 ->get();
    $img ='phukien-ps-5.jpg';
    return view('typeproductDetails',compact('data','img'));  
   
});
Route::get('collection/game-ps-4',function(){
    $data = DB::table('products')->join('type_products','products.id_type','=','type_products.id')
                                 ->where([
                                     ['type_products.name',"PlayStation4"],
                                     ['products.classification',"game"]
                                 ])
                                 ->select('products.*','type_products.name as type')
                                 ->get();
    $img ='phukien-ps-5.jpg';
    return view('typeproductDetails',compact('data','img'));  
});
Route::get('collection/phukien-ps-4',function(){
    $data = DB::table('products')->join('type_products','products.id_type','=','type_products.id')
                                 ->where([
                                     ['type_products.name',"PlayStation4"],
                                     ['products.classification',"phụ kiện"]
                                 ])
                                 ->select('products.*','type_products.name as type')
                                 ->get();
    $img ='phukien-ps-5.jpg';
    return view('typeproductDetails',compact('data','img'));  
});
// collection switch
Route::get('collection/may-switch',function(){
    $data = DB::table('products')->join('type_products','products.id_type','=','type_products.id')
                                 ->where([
                                     ['type_products.name',"Switch"],
                                     ['products.classification',"máý"]
                                 ])
                                 ->select('products.*','type_products.name as type')
                                 ->get();
    $img ='phukien-ps-5.jpg';
    return view('typeproductDetails',compact('data','img'));  
});
Route::get('collection/game-switch',function(){
    $data = DB::table('products')->join('type_products','products.id_type','=','type_products.id')
                                 ->where([
                                     ['type_products.name',"Switch"],
                                     ['products.classification',"game"]
                                 ])
                                 ->select('products.*','type_products.name as type')
                                 ->get();
    $img ='phukien-ps-5.jpg';
    return view('typeproductDetails',compact('data','img'));  
});
//BestSeller Product
Route::get('bestseller',[mainController::class,'bestsellerProduct']);
//Charts
Route::get('barChart',[mainController::class,'barChartData']);
Route::get('showBarChart',[mainController::class,'showBarChart']);
Route::get('pieChart',[mainController::class,'pieChartData']);
Route::get('showPieChart',[mainController::class,'showPieChart']);