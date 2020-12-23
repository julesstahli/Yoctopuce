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

  $router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
  });
  $router->get('/measures', function() {
    return Measure::orderBy("created_at", "desc")->get();
  });
  $router->get('/measure', function() {
    return Measure::orderBy("created_at", "desc")->first();
  });

});
