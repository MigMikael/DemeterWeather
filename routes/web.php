<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome2');
});


Route::get('weather', 'WeatherController@index');
Route::get('weather/province/{province}', 'WeatherController@provinceWeather');
Route::get('weather/location/{latitude}/{longitude}', 'WeatherController@locationWeather');
Route::get('weather/send_weather_forecast/{latitude}/{longitude}', 'WeatherController@sendWeatherForecast');