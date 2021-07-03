<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => '/api/v1'], function() use($router){
    $router->group(['prefix' => '/states'], function() use($router){
        $router->get('/states', ['as' => 'api.states.index', 'uses' => 'StateController@index']);
        $router->get('/', ['as' => 'api.states.index', 'uses' => 'StateController@index']);
        $router->get('/{id}', ['as' => 'api.states.show', 'uses' => 'StateController@show']);
        $router->post('/', ['as' => 'api.states.store', 'uses' => 'StateController@store']);
        $router->put('/{id}', ['as' => 'api.states.update', 'uses' => 'StateController@update']);
        $router->delete('/{id}', ['as' => 'api.states.delete', 'uses' => 'StateController@delete']);
    });

    $router->group(['prefix' => '/cities'], function() use($router){
        $router->get('/cities', ['as' => 'api.cities.index', 'uses' => 'CityController@index']);
        $router->get('/', ['as' => 'api.cities.index', 'uses' => 'CityController@index']);
        $router->get('/{id}', ['as' => 'api.cities.show', 'uses' => 'CityController@show']);
        $router->post('/', ['as' => 'api.cities.store', 'uses' => 'CityController@store']);
        $router->put('/{id}', ['as' => 'api.cities.update', 'uses' => 'CityController@update']);
        $router->delete('/{id}', ['as' => 'api.cities.delete', 'uses' => 'CityController@delete']);
    });

    $router->group(['prefix' => '/districts'], function() use($router){
        $router->get('/districts', ['as' => 'api.districts.index', 'uses' => 'DistrictController@index']);
        $router->get('/', ['as' => 'api.districts.index', 'uses' => 'DistrictController@index']);
        $router->get('/{id}', ['as' => 'api.districts.show', 'uses' => 'DistrictController@show']);
        $router->post('/', ['as' => 'api.districts.store', 'uses' => 'DistrictController@store']);
        $router->put('/{id}', ['as' => 'api.districts.update', 'uses' => 'DistrictController@update']);
        $router->delete('/{id}', ['as' => 'api.districts.delete', 'uses' => 'DistrictController@delete']);
    });
});

