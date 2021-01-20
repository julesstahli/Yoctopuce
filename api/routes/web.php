<?php
use App\Measure;

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
  return view("index");
});

$router->group(["prefix" => "api"], function () use ($router) {
    $router->get('/', function(){
        return view("api");
    });
  $router->get('/measures', 'MeasuresController@all');
  $router->get('/measure', 'MeasuresController@last');

});

if (env('APP_DEBUG', false)) {
    $router->get('/key', function() {
        return \Illuminate\Support\Str::random(32);
    });
}
