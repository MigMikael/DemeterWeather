<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather.index');
    }

    public function provinceWeather($province)
    {
        $locationKey = self::getLocationKeyByProvince($province);
        $forecastsData = self::getDailyForecasts($locationKey);

        return $forecastsData;
    }

    public function locationWeather($latitude, $longitude)
    {
        $locationKey = self::getLocationKeyByLatLong($latitude, $longitude);
        $forecastsData = self::getDailyForecasts($locationKey);

        return $forecastsData;
    }

    public function getLocationKeyByProvince($province)
    {
        $province = str_replace('_', ' ', $province);
        $province = urlencode($province);

        $apiKey = env('ACCU_WEATHER_API_KEY');
        $url = 'http://dataservice.accuweather.com/locations/v1/TH/search?apikey='.$apiKey.'&q='.$province;

        $provinces = self::curlGetRequest($url);

        Log::info('location Key: '.$provinces[0]['Key']);
        Log::info('location Name: '.$provinces[0]['AdministrativeArea']['EnglishName']);

        return $provinces[0]['Key'];
    }

    public function getLocationKeyByLatLong($latitude, $longitude)
    {
        $latitude = str_replace('_', '.', $latitude);
        $longitude = str_replace('_', '.', $longitude);
        $geoLocation = urlencode($latitude.','.$longitude);

        $apiKey = env('ACCU_WEATHER_API_KEY');
        $url = 'http://dataservice.accuweather.com/locations/v1/cities/geoposition/search?apikey='.$apiKey.'&q='.$geoLocation;

        $province = self::curlGetRequest($url);

        return $province['Key'];
    }

    public function getDailyForecasts($locationKey)
    {
        $apiKey = env('ACCU_WEATHER_API_KEY');
        $url = 'http://dataservice.accuweather.com/forecasts/v1/daily/1day/'.$locationKey;
        $url .= '?apikey='.$apiKey.'&metric=true';

        $forecastData = self::curlGetRequest($url);
        return $forecastData;
    }

    public function curlGetRequest($url)
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

    /*public function testCallAPI()
    {
        $url = '';
        $header = 'Authorization: Bearer 1cf79c3815e14dcca43920c4c5368285';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'
        ));

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        curl_close($curl);

        return $data;
    }*/
}
