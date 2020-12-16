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
    return $router->app->version();
});

$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});
$router->get('/insert', function() {
    $measure = new Measure();
    $measure->temperature = 35.51258;
    $measure->pression = 15.2561;
    $measure->humidity = 87.516476;
    $measure->brightness = 5.468764;
    $measure->save();
    return "success";
});
$router->get('/measure', function() {
  $measures = [];
  foreach (Measure::get() as $value) {
    $measures[$value->id] = $value;
  }
  return $measures;
});
