<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\mymodel;

Route::get('/', function () {
    return view('welcome');
});
//$data = mymodel::all();

Route::view("home","crudbymodalview");
Route::post('/myajax','Controller@insert');
Route::post("/myajax1","Controller@delete");
Route::post("/myajax2","Controller@edit");

//Route::post("home1","Controller@insert");
//
