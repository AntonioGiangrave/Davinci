<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/companies', 'CompanyController@getCompanies');

Route::get('/vouchers/{id}/', 'CompanyController@getVouchers');

Route::get('/vouchers', 'CompanyController@getVouchersList');

Route::post('/create-voucher', 'Controller@createVoucher');

Route::get('/seed', function () {
    return Artisan::call('db:seed');
});

Route::get('/clean', function () {
    Cache::flush();

    \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    \App\Voucher::query()->truncate();
    \App\Company::query()->truncate();
    \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    return;
});
