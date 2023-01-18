<?php

use App\Models\Customer;
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

/**
 * (仮) Customer の一覧を返す
 * ある程度挙動が完成したタイミングでルーティングから処理を切り出す
 */
Route::get('customers', function () {
    $customers = Customer::query()->select(['id', 'name'])->get();
    return response()->json($customers);
});
Route::post('customers', function () {
    return;
});
Route::get('customers/{customer_id}', function () {
    return;
});
Route::put('customers/{customer_id}', function () {
    return;
});
Route::delete('customers/{customer_id}', function () {
    return;
});
Route::get('reports', function () {
    return;
});
Route::post('reports', function () {
    return;
});
Route::get('reports/{report_id}', function () {
    return;
});
Route::put('reports/{report_id}', function () {
    return;
});
Route::delete('reports/{report_id}', function () {
    return;
});