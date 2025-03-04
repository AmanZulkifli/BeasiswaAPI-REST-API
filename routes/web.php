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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/login', 'UserController@login');
$router->post('/signup', 'UserController@store');

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->group(['prefix' => 'scholarships'], function () use ($router) {
        $router->get('/', 'ScholarshipController@index');
        $router->post('/', 'ScholarshipController@store');
        $router->patch('/{id}', 'ScholarshipController@update');
        $router->delete('/{id}', 'ScholarshipController@destroy');
    });
    
    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->get('/', 'UserController@index');
        $router->get('/me', 'UserController@profile');
        $router->patch('/{id}', 'UserController@update');
        $router->delete('/{id}', 'UserController@destroy');
    });

    $router->group(['prefix' => 'details'], function () use ($router) {
        $router->get('/', 'DetailController@index');
        $router->post('/', 'DetailController@store');
    });

    $router->group(['prefix' => 'times'], function () use ($router) {
        $router->post('/', 'TimeController@store');
    });
});

$router->get('/logout', 'UserController@logout');

