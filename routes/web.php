<?php

use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/package', function () {
    return view('packages.index');
})->name('package');

Route::get('/customer', function () {
    return view('customers.index');
})->name('customer');
