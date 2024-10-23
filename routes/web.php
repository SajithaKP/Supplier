<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'supplier','as'=>'suppliers.'],function(){
    Route::get('index',[SupplierController::class,'index'])->name('index');
    Route::get('create',[SupplierController::class,'create'])->name('create');
    Route::get('show/{id}',[SupplierController::class,'show'])->name('show');
    Route::post('store',[SupplierController::class,'store'])->name('store');
    Route::get('edit/{id}',[SupplierController::class,'edit'])->name('edit');
    Route::patch('update/{id}',[SupplierController::class,'update'])->name('update');
    Route::delete('delete/{id}',[SupplierController::class,'destroy'])->name('delete');
});

Route::group(['prefix'=>'item','as'=>'items.'],function(){
    Route::get('index',[ItemController::class,'index'])->name('index');
    Route::get('create',[ItemController::class,'create'])->name('create');
    Route::get('show/{item}',[ItemController::class,'show'])->name('show');
    Route::post('store',[ItemController::class,'store'])->name('store');
    Route::get('edit/{item}',[ItemController::class,'edit'])->name('edit');
    Route::patch('update/{item}',[ItemController::class,'update'])->name('update');
    Route::delete('delete/{id}',[ItemController::class,'destroy'])->name('delete');
});

//Route::resource('purchaseorders', PurchaseOrderController::class);
Route::group(['prefix'=>'purchaseorder','as'=>'purchaseorders.'],function(){
    Route::get('index', [PurchaseOrderController::class,'index'])->name('index');
    Route::get('create', [PurchaseOrderController::class,'create'])->name('create');
    Route::post('store',[PurchaseOrderController::class,'store'])->name('store');
});
Route::get('purchaseorder/print', [PurchaseOrderController::class, 'print'])->name('purchaseorders.print');
Route::get('purchaseorder/exportExcel', [PurchaseOrderController::class, 'exportExcel'])->name('purchaseorders.exportExcel');

