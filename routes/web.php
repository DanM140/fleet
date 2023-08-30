<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\Vehicle_DriverController;
use App\Http\Controllers\InspectionController;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/',[AuthController::class , 'login']);
Route::post('/login',[AuthController::class, 'Authlogin']);
Route::get('/logout',[AuthController::class , 'logout']);
Route::get('/forgot-password',[AuthController::class , 'forgotpassword']);
Route::post('/forgot-password',[AuthController::class , 'PostForgotPassword']);
Route::get('reset/{token}',[AuthController::class,'reset']);
Route::post('reset/{token}',[AuthController::class,'PostReset']);
Route::get('admin/drivers/list', function () {
    return view('admin.drivers.list');
});
Route::group(['middleware'=>'admin'], function(){
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });
    //drivers' list
    Route::get('admin/drivers/list',[DriverController::class,'list']);
    Route::get('admin/drivers/add',[DriverController::class,'add']);
    Route::post('admin/drivers/add',[DriverController::class,'insert']);
    Route::get('admin/drivers/edit/{id}',[DriverController::class,'edit']);
    Route::post('admin/drivers/edit/{id}',[DriverController::class,'update']);
    Route::get('/admin/drivers/delete/{id}',[DriverController::class,'delete']);
    //add vehicle
    Route::get('admin/vehicle/list',[VehicleController::class,'list']);
    Route::get('admin/vehicle/add',[VehicleController::class,'add']);
    Route::post('admin/vehicle/add',[VehicleController::class,'insert']);
    Route::get('admin/vehicle/edit/{id}',[VehicleController::class,'edit']);
    Route::post('admin/vehicle/edit/{id}',[VehicleController::class,'update']);
    Route::get('/admin/vehicle/delete/{id}',[VehicleController::class,'delete']);
    //vehicle management
    Route::get('admin/assign_vehicle/list',[Vehicle_DriverController::class,'list']);
    Route::get('admin/assign_vehicle/add',[Vehicle_DriverController::class,'add']);
    Route::post('admin/assign_vehicle/add',[Vehicle_DriverController::class,'insert']);
    Route::get('admin/assign_vehicle/edit/{id}',[Vehicle_DriverController::class,'edit']);
    Route::post('admin/assign_vehicle/edit/{id}',[Vehicle_DriverController::class,'update']);
    Route::get('/admin/assign_vehicle/delete/{id}',[Vehicle_DriverController::class,'delete']);
     //inspection history
     Route::get('admin/inspection/list',[InspectionController::class,'list']);
     Route::get('admin/inspection/add',[InspectionController::class,'add']);
     Route::post('admin/inspection/add',[InspectionController::class,'insert']);
     Route::get('admin/inspection/edit/{id}',[InspectionController::class,'edit']);
     Route::post('admin/inspection/edit/{id}',[InspectionController::class,'update']);
     Route::get('/admin/inspection/delete/{id}',[InspectionController::class,'delete']);


       

});