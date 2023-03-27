<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/query', function(){
    // $results = DB::table('customers')->get();
    // echo "<pre>";
    // print_r($results);
    // echo "</pre>";



    $results = DB::table('products')
    ->join('productlines', 'products.productLine', '=', 'productlines.productLine')
    ->select('products.*', 'productlines.textDescription')
    ->get();
    echo "<pre>";
    print_r($results);
    echo "</pre>";



});
