<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
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

Route::get('/', function () {
    $connection = DB::connection('mongodb');
    $msg = 'MongoDB is accessible!';
    try {  
    $connection->command(['ping' => 1]);  
    } catch (\Exception  $e) {  
    $msg = 'MongoDB is not accessible. Error: ' . $e->getMessage();
    }
    return ['msg' => $msg];
});

Route::get('/teste', function () {
    return Product::create([
                'guid'=> 'cust_0000',
                'first_name'=> 'John',
                'family_name' => 'Doe',
                'email' => 'j.doe@gmail.com',
                'address' => '123 my street, my city, zip, state, country'
            ]);;
});
