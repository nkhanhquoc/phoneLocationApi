<?php
# @Author: Nguyen Quoc Khanh <nkhanhquoc>
# @Date:   23-May-2018
# @Email:  nkhanhquoc@gmail.com
# @Project: {ProjectName}
# @Filename: api.php
# @Last modified by:   nkhanhquoc
# @Last modified time: 30-May-2018
# @Copyright: by nkhanhquoc@gmail.com




use Illuminate\Http\Request;

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
// Route::group(['prefix' => 'api'], function () {
    Route::post('check', 'AgentController@index');
    Route::post('create', 'AgentController@create');
    Route::post('store', 'AgentController@store');
    Route::post('add-device', 'AgentController@addDevice');
// });

Route::view('/{any}', 'welcome')
    ->where('any', '.*');
