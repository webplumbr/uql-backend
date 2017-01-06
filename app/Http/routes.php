<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//force URL generators to use https as the default schema
//comment the following line on local development machine - if it is of hinderance
//@todo turn this in to an environment based setting

Route::get('/api/library/{id}', ['uses' => 'ApiController@details', 'as' => 'get_details']);
Route::post('/api/library', ['uses' => 'ApiController@update', 'as' => 'update_details']);
