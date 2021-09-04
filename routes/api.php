<?php

use App\Http\Controllers\EntryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Order\OrderController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth',
    'namespace' => 'Auth',
    'middleware' => ['cors']
], function() {

    Route::post('login',[\App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('register', function (){
        return bcrypt('13741374');
    });

});

Route::group([

], function () {

    Route::apiResource('order', OrderController::class);
});


Route::group([

    'middleware' => ['cors']
], function() {

    Route::apiResource('item', ItemController::class);

});


Route::group([

    'middleware' => ['cors'],
    'namespace' => 'man'
], function() {

    Route::get('man', [\App\Http\Controllers\man\SearchController::class, 'manSearch']);

});

Route::apiResource('men',\App\Http\Controllers\man\ManController::class, );

Route::group([

    'middleware' => ['cors'],
    'namespace' => 'place'
], function() {

    Route::get('place', [\App\Http\Controllers\place\SearchController::class, 'placeSearch']);

});
Route::apiResource('places', App\Http\Controllers\place\PlaceController::class );




Route::group([

    'middleware' => ['cors'],
    'namespace' => 'item'
], function() {

    Route::get('itemSearch', [\App\Http\Controllers\item\SearchController::class, 'itemSearch']);

});

Route::apiResource('entry', EntryController::class);
Route::get('report/todayentries', [\App\Http\Controllers\Entry\EntrySearchController::class, 'todayEntries']);
Route::get('report/entrysearch', [\App\Http\Controllers\Entry\EntrySearchController::class, 'searchByDate']);
Route::get('report/searchcheckoutbydate', [\App\Http\Controllers\Entry\EntrySearchController::class, 'searchCheckoutByDate']);


Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact 09149359323'], 404);
});
