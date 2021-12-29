<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SMSController;
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
//Route::get('/sms','SMSController@sendSMSOrange');
//Route::get('sms', [SMSController::class, 'sendSMSOrange']);
//Route::resource("/sms","OSMSController");
//Route::apiResource("osms","OSMSController");
//Route::get('test',[OSMSController::class, 'index']);
Route::group([
    'middleware' => 'api',
    'prefix' => 'v1/Osms',
    //'namespace' => 'Api\V1\UserFolder',
], function ($router) {
        Route::post('send-sms','SMSController@sendSMSOrange');
        Route::get('send-sms2','SMSController@send');
        Route::get('baba','SMSController@babs');
    });
