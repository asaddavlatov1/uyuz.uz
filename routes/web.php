<?php

use App\Http\Controllers\AddFlatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdmineditController;
use App\Http\Controllers\AdminEditsController;
use App\Http\Controllers\AdminusController;
use App\Http\Controllers\AUserController;
use App\Http\Controllers\auth;
use App\Http\Controllers\ComfortController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\NearbyController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\WelcomeController;
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
Route::prefix('admin')->group(function () { 
    Route::get('/region',[RegionController::class,'region']);
    Route::get('/district',[DistrictController::class,'district']);
    Route::get('/flat',[FlatController::class,'flat']);
    Route::get('/nearby',[NearbyController::class,'nearby']);
    Route::get('/payment',[PaymentController::class,'payment']);
    Route::get('/comfort',[ComfortController::class,'comfort']);
    Route::post('/regioncode',[RegionController::class,'regioncode']); 
    Route::post('/districtcode',[DistrictController::class,'districtcode']);
    Route::post('/flatcode',[FlatController::class,'flatcode']);
    Route::post('/nearbycode',[NearbyController::class,'nearbycode']);
    Route::post('/paymentcode',[PaymentController::class,'paymentcode']);
    Route::post('/comfortcode',[ComfortController::class,'comfortcode']); 
    
    
  });

Route::prefix('adminedit')->group(function(){
    Route::get('/regiondelete',[RegionController::class,'regiondelete']);
    Route::get('/districtdelete',[DistrictController::class,'districtdelete']);
    Route::get('/comfortall',[ComfortController::class,'comfortall']);
    Route::get('/flatall',[FlatController::class,'flatall']);
    Route::get('/nearbyall',[NearbyController::class,'nearbyall']);
    Route::get('/paymentall',[PaymentController::class,'paymentall']);
    Route::get('/paymentdelete', [PaymentController::class, 'paymentdelete']);
    Route::get('/flatdelete', [FlatController::class, 'flatdelete']);
    Route::get('/nearbydelete', [NearbyController::class, 'nearbydelete']);
    Route::get('/comfortdelete', [ComfortController::class, 'comfortdelete']);
});  

Route::prefix('admins')->group(function () {   
    Route::get('/show',[AdminusController::class,'userindex']);    
    Route::get('/delete',[AdminusController::class,'delete']); 
  });  




Route::get('/user', [UserDashboardController::class, 'show']);
Route::get('/usercabinet', [UserDashboardController::class, 'usercabinet']);
Route::get('/userflats', [UserDashboardController::class, 'userflats']);

Route::prefix('flats')->group(function(){
    Route::post('/store', [AddFlatController::class, 'store']);
    Route::get('/create', [AddFlatController::class, 'create']);
    Route::post('/createcode', [AddFlatController::class, 'createcode']);
    
});
Route::get('/flatindex/{id}', [UserDashboardController::class, 'index']);

Route::get('/getdistrict', [AddFlatController::class, 'getdistrict'])->name('getdistrict');
Route::get('/getcomfort', [AddFlatController::class, 'getcomfort'])->name('getcomfort');
Route::get('/getnearby', [AddFlatController::class, 'getnearby'])->name('getnearby');

Route::get('/admin', [AdminController::class, 'show']);

Route::get('/', [WelcomeController::class, 'flat']);

Route::get('/flat_type/{id}', [WelcomeController::class, 'flat_type']);


Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::post('/adduser', [UserController::class, 'adduser']);
Route::get('/getlogindata', [UserController::class, 'getlogin'])->name('getlogindata');
Route::post('/check', [UserController::class, 'check']);





