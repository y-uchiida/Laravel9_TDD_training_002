<?php

use App\Http\Controllers\ApiController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

/**
 * (仮) リクエストされたデータでcustomers にレコードを追加する
 * ある程度挙動が完成したタイミングでルーティングから処理を切り出す
 */
Route::post('customers', function (Request $request) {
    $inputName = $request->json('name');
    if (!$inputName) {
        return response()->make('', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $customer = new Customer();
    $customer->name = $inputName;
    $customer->save();
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