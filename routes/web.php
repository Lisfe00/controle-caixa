<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

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

Route::get('/', [SalesController::class, 'index'])->name('sales.view');

Route::post('/create/product/', [ProductController::class, 'create'])->name('create.product');
Route::post('/update/product/', [ProductController::class, 'update']);
Route::get('/create/product/', [ProductController::class, 'index'])->name('create.product.view');
Route::get('/get/product/{id}', [ProductController::class, 'get_product']);
Route::get('/delete/product/{id}', [ProductController::class, 'delete']);

Route::post('/create/client/', [ClientController::class, 'create'])->name('create.client');
Route::post('/update/client/', [ClientController::class, 'update']);
Route::get('/create/client/', [ClientController::class, 'index'])->name('create.client.view');
Route::get('/get/client/{id}', [ClientController::class, 'get_client']);
Route::get('/delete/client/{id}', [ClientController::class, 'delete']);

Route::post('/get/sale/value/', [SalesController::class, 'get_value']);
Route::post('/create/sale/', [SalesController::class, 'create'])->name('create.sale');
Route::get('/get/sale/product/{codigo}', [SalesController::class, 'get_product']);
Route::get('/get/sale/client/{cpf}', [SalesController::class, 'get_client']);

