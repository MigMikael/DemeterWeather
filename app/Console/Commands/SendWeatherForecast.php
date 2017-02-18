<?php

namespace App\Console\Commands;
use App\Http\Controllers\WeatherController;
use Illuminate\Console\Command;
use Log;

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
        //$weatherCtrl = new WeatherController();
        //$weatherCtrl->sendWeatherForecast($lat, $long);

        // Todo system call python script
        //http://stackoverflow.com/questions/5497540/how-to-call-a-python-script-from-php

        $lastLine = '';
        $lastLine = system('python /home/pi/Documents/canet/adc_serial.py', $retrieval);
        Log::info('###### '. $lastLine);
    }
}
