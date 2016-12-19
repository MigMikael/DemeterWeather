<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;

class WeatherController extends Controller
{
    public function show($province)
    {
        $locationKey = self::getLocationKey($province);
        $forecastsData = self::getDailyForecasts($locationKey);

        return $forecastsData;
    }

    public function getLocationKey($province)
    {
        $province = str_replace('_', ' ', $province);
        $province = urlencode($province);

        $apiKey = env('ACCU_WEATHER_API_KEY');
        $url = 'http://dataservice.accuweather.com/locations/v1/TH/search?apikey='.$apiKey.'&q='.$province;

        $provinces = self::curlProcess($url);

        Log::info('location Key: '.$provinces[0]['Key']);
        Log::info('location Name: '.$provinces[0]['AdministrativeArea']['EnglishName']);

        return $provinces[0]['Key'];
    }

    public function getDailyForecasts($locationKey)
    {
        $apiKey = env('ACCU_WEATHER_API_KEY');
        $url = 'http://dataservice.accuweather.com/forecasts/v1/daily/1day/'.$locationKey;
        $url .= '?apikey='.$apiKey.'&metric=true';

        $forecastData = self::curlProcess($url);
        return $forecastData;
    }

    public function curlProcess($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'
        ));

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        curl_close($curl);

        return $data;
    }
}
