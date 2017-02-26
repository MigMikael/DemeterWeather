<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function sendDataToCloud()
    {

        $weatherUrl = 'http://ceresweather.herokuapp.com/api/store/data/weather';
        $plantUrl = 'http://ceresweather.herokuapp.com/api/store/data/plant';

        $weatherData = self::getWeatherData();
        $plantData = self::getPlantData();

        $newPlantData = [
            'original_image' => $plantData['original_image'],
            'process_image' => $plantData['process_image']
        ];
        $weatherData['humidity_sensor'] = $plantData['humidity'];

        self::curlPostRequest($weatherUrl, $weatherData);
        $responseData = self::curlPostRequest($plantUrl, $newPlantData);

        return $responseData;
    }

    public function getWeatherData()
    {
        $lat = '13.818938';
        $lon = '100.040273';
        $APIKey = '7496ae935555c45c54878184596c7cbc';
        $url = 'http://api.openweathermap.org/data/2.5/weather?lat='.$lat.'&lon='.$lon.'&appid='.$APIKey;

        $data = self::curlGetRequest($url);
        $weatherData = [
            'temp_min' => $data['main']['temp_min'] - 272.15,
            'temp_max' => $data['main']['temp_max'] - 272.15,
            'humidity' => $data['main']['humidity'],
            'humidity_sensor' => 0,
            'clouds' => $data['clouds']['all'],
            'wind_speed' => $data['wind']['speed'],
            'weather_main' => $data['weather'][0]['main'],
            'weather_description' => $data['weather'][0]['description'],
            'weather_icon' => $data['weather'][0]['icon']
        ];
        return $weatherData;
    }

    public function getPlantData()
    {
        $lastLine = 50;
        // read value from humidity sensor
        //$lastLine = system('python '.base_path('public\\agent\\adc_serial.py'), $retrieval);

        //take picture with RPi Cam
        //system('python /home/pi/Documents/canet/take_picture.py', $ret);

        $filename1 = base_path('public/original_image.jpg');
        $filename2 = base_path('public/process_image.jpg');
        $cFile1 = new \CURLFile($filename1);
        $cFile2 = new \CURLFile($filename2);

        //Todo Read Image from path
        $plantData = [
            'humidity' => $lastLine,
            'original_image' => $cFile1,
            'process_image' => $cFile2
        ];

        return $plantData;
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

    public function curlPostRequest($url, $data)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data
        ));

        $response = curl_exec($curl);
        Log::info('Response '. $response);
        $responseData = json_decode($response, true);
        curl_close($curl);

        return $responseData;
    }

    public function testFilePath()
    {
        return base_path('public/original_image.jpg');
    }
}
