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


    // $results = DB::table('products')
    //         ->join('productlines', 'products.productLine', '=', 'productlines.productLine')
    //         ->select('products.*', 'productlines.textDescription')
    //         ->get();
    // echo "<pre>";
    // print_r($results);
    // echo "</pre>";

    // $results = DB::table('products as t1')
    //             ->join('productlines as t2', 't1.productLine', '=', 't2.productLine')
    //             ->select('productCode', 'productName', 'textDescription')
    //             ->get();
    // echo "<pre>";
    // print_r($results);
    // echo "</pre>";

    $results = DB::table('orders')
                ->join('orderdetails', 'orders.orderNumber', '=', 'orderdetails.orderNumber')
                ->select('orders.orderNumber', 'orders.status', DB::raw('SUM(orderdetails.quantityOrdered * orderdetails.priceEach) as total'))
                ->groupBy('orders.orderNumber','orders.status')
                ->get();
    echo "<pre>";
    print_r($results);
    echo "</pre>";



});
