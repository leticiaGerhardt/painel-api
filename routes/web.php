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
    $router->group(['prefix' => 'states'], function() use($router){
        $router->get('/', ['as' => 'api.state.index', 'uses' => 'StateController@index']);
        $router->get('/{state}', ['as' => 'api.state.show', 'uses' => 'StateController@show']);
        $router->post('/', ['as' => 'api.state.store', 'uses' => 'StateController@store']);
        $router->put('/{state}', ['as' => 'api.state.update', 'uses' => 'StateController@update']);
        $router->delete('/{state}', ['as' => 'api.state.delete', 'uses' => 'StateController@delete']);
    });
});

