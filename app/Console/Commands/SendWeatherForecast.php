<?php

namespace App\Console\Commands;
use App\Http\Controllers\WeatherController;
use Illuminate\Console\Command;

class SendWeatherForecast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:weatherForecast';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Send Weather Forecast Data to Persephone's Cloud";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $lat = '13_809739';
        $long = '100_045359';
        $weatherCtrl = new WeatherController();
        $weatherCtrl->sendWeatherForecast($lat, $long);
    }
}