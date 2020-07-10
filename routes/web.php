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

$router->post('auth/login','AuthController@login');
$router->get('/', function () use ($router) {
    // return $router->app->version();
    return "JURID API REST ".$router->app->version();
});

$router->group(['middleware'=>[App\Http\Middleware\apiProtectedRoute::class]],function() use ($router){
    // route for session management
    $router->group(['prefix'=>'auth'],function() use ($router){
        $router->post('logout','AuthController@logout');
        $router->get('me','AuthController@me');
    });
    
    // routes for users data
    $router->group(['prefix'=>'users'],function() use ($router){
        $router->get('/','UserController@index');
    });
    
    
    // routes for events data
    $router->group(['prefix'=>'eventos'],function() use ($router){
        $router->get('/','EventoController@index');
        $router->get('/id/{evento}','EventoController@show_id');
        $router->post('/showman','EventoController@show_showman');
        $router->post('/description','EventoController@show_description');
        
        $router->post('/','EventoController@store');
        $router->put('/{evento}','EventoController@update');
        $router->delete('/{evento}','EventoController@destroy');
    });


    // $router->get('/{evento}','EventoController@show');
    
    // $router->post('/','EventoController@store');
    // $router->put('/{evento}','EventoController@update');
    // $router->delete('/{evento}','EventoController@destroy');
});