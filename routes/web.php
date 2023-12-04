<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\SailsController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [SailsController::class, 'index'])->name('sails.view');

Route::get('/list', [ProductController::class, 'list'])->name('list.products');
Route::get('/create/product', [ProductController::class, 'index'])->name('create.product.view');
Route::post('/create/product', [ProductController::class, 'create'])->name('create.product');
