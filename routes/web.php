<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/healthcheck', function () {
    return response('OK', 200)
        ->header('Content-Type', 'text/plain');
});

Route::get('/', [
    'as' => 'signifly.index',
    'uses' => 'Application\Controller@index',
]);

Route::get('/project/{id}', [
    'as' => 'signifly.project.view',
    'uses' => 'Application\Controller@viewProject',
]);

Route::post('/project/asign/{projectid}', [
    'as' => 'signifly.project.asign',
    'uses' => 'Application\Controller@asign',
]);

Route::post('/project/remove/{projectid}', [
    'as' => 'signifly.project.remove',
    'uses' => 'Application\Controller@remove',
]);

Route::get('/signiflyers', [
    'as' => 'signifly.signiflyers.index',
    'uses' => 'Application\SigniflyersController@index',
]);

Route::get('/signiflyers/get', [
    'as' => 'signifly.signiflyers.get',
    'uses' => 'Application\SigniflyersController@get',
]);

Route::get('/signiflyers/edit/{id}', [
    'as' => 'signifly.signiflyers.edit',
    'uses' => 'Application\SigniflyersController@edit',
]);

Route::post('/signiflyers/update/{id}', [
    'as' => 'signifly.signiflyers.update',
    'uses' => 'Application\SigniflyersController@update',
]);

Route::get('/signiflyers/create', [
    'as' => 'signifly.signiflyers.create',
    'uses' => 'Application\SigniflyersController@create',
]);

Route::post('/signiflyers/store', [
    'as' => 'signifly.signiflyers.store',
    'uses' => 'Application\SigniflyersController@store',
]);