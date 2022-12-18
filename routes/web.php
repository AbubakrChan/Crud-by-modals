<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can registzer web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\student;

//Route::get('/', function () {
 //   return view('welcome');
//});
//Route::get('dropdown', [\App\Http\StudentControllers\StudentController::class, 'index']);


Route::get("home","StudentController@index");
Route::get("insertbuttononclick/{roll_no}","StudentController@create");
Route::post('insert','StudentController@store');
Route::get('delete/{id}','StudentController@destroy');
Route::get('detail/{id}','StudentController@show');
Route::get('edit/{id}','StudentController@edit');
Route::post('update','StudentController@update');
//Route::view('qr-code-g', 'resources/view/qrCode.blade.php');
Route::get('qr-code-g', function () {
   return view('qrCode');
});
//Route::post('a','StudentController@update');

