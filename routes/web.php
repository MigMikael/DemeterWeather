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
    return view('index');
});

/*
Route::get('weather', 'WeatherController@index');
Route::get('weather/province/{province}', 'WeatherController@provinceWeather');
Route::get('weather/location/{latitude}/{longitude}', 'WeatherController@locationWeather');
Route::get('weather/send_weather_forecast/{latitude}/{longitude}', 'WeatherController@sendWeatherForecast');
*/

Route::get('send_data', 'DataController@sendDataToCloud');
Route::get('weather_data', 'DataController@getWeatherData');
Route::get('plant_data', 'DataController@getPlantData');

Route::get('test_file', 'DataController@testFilePath');