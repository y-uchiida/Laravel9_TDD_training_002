<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('customers', [ApiController::class, 'getCustomers']);
Route::post('customers', [ApiController::class, 'storeCustomer']);
Route::get('customers/{customer_id}', [ApiController::class, 'getCustomer']);
Route::put('customers/{customer_id}', [ApiController::class, 'updateCustomer']);
Route::delete('customers/{customer_id}', [ApiController::class, 'deleteCustomer']);
Route::get('reports', [ApiController::class, 'getReports']);
Route::post('reports', [ApiController::class, 'storeReport']);
Route::get('reports/{report_id}', [ApiController::class, 'getReport']);
Route::put('reports/{report_id}', [ApiController::class, 'updateReport']);
Route::delete('reports/{report_id}', [ApiController::class, 'deleteReport']);