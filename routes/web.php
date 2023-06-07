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

    // $results = DB::table('orders')
    //             ->join('orderdetails', 'orders.orderNumber', '=', 'orderdetails.orderNumber')
    //             ->select('orders.orderNumber', 'orders.status', DB::raw('SUM(orderdetails.quantityOrdered * orderdetails.priceEach) as total'))
    //             ->groupBy('orders.orderNumber','orders.status')
    //             ->get();
    // echo "<pre>";
    // print_r($results);
    // echo "</pre>";

    // $results = DB::table('orders')
    //             ->select('orders.orderNumber', 'customers.customerName', 'orders.orderDate', 'orderdetails.orderLineNumber', 'products.productName', 'orderdetails.quantityOrdered', 'orderdetails.priceEach')
    //             ->join('orderdetails', 'orders.orderNumber', '=', 'orderdetails.orderNumber')
    //             ->join('products', 'orderdetails.productCode', '=', 'products.productCode')
    //             ->join('customers', 'orders.customerNumber', '=', 'customers.customerNumber')
    //             ->orderBy('orders.orderNumber')
    //             ->orderBy('orderdetails.orderLineNumber')
    //             ->get();
    // echo "<pre>";
    // print_r($results);
    // echo "</pre>";

    // $results = DB::table('products as p')
    //             ->select('o.orderNumber', 'p.productName', 'p.MSRP', 'o.priceEach')
    //             ->join('orderdetails as o', function($join){
    //                 $join->on('p.productCode', '=', 'o.productCode')
    //                     ->whereRaw('p.MSRP > o.priceEach');
    //             })
    //             ->get();
    // echo "<pre>";
    // print_r($results);
    // echo "</pre>";

    // left join
    // $results = DB::table('customers as c')
    //             ->select('c.customerNumber', 'c.customerName', 'o.orderNumber', 'o.status')
    //             ->leftJoin('orders as o', 'c.customerNumber', '=', 'o.customerNumber')
    //             ->get();
    // echo "<pre>";
    // print_r($results);
    // echo "</pre>";

    // right join
    //jibone order koreni emon customer
    // $results = DB::table('customers as c')
    //             ->select('c.customerName')
    //             ->rightJoin('orders as o', 'c.customerNumber', '<>', 'o.customerNumber')
    //             ->distinct('c.customerName')
    //             ->get();
    // echo "<pre>";
    // print_r($results);
    // echo "</pre>";

    //left join
    //jara jibone order deyni
    // $results = DB::table('customers as c')
    //             ->select('c.customerName')
    //             ->leftJoin('orders as o', 'c.customerNumber', '=', 'o.customerNumber')
    //             ->whereNull('o.customerNumber')
    //             ->get();
    // echo "<pre>";
    // print_r($results);
    // echo "</pre>";

    //self join
    //m for manager e for employee
    $results = DB::table('employees as m')
        ->join('employees as e', 'm.employeeNumber', '=', 'e.reportsTo')
        ->selectRaw("e.employeeNumber as 'EmployeeID', CONCAT(e.firstName,' ',e.lastName) as 'EmployeeName', m.employeeNumber as 'BossID', CONCAT(m.firstName,' ',m.lastName) as 'BossName'")
        ->get();
        echo "<pre>";
        print_r($results);
        echo "</pre>";
});

