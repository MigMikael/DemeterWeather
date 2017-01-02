@extends('template')

@section('navigate')
    <li><a href="{{ url('weather') }}"> > Weather</a></li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <h1>
                <span class="label label-default">
                    Demeter's weather API
                </span>
            </h1>
        </div>
    </div>
    <hr>
    <div class="row" style="text-align: center">
        <div class="col-md-2 col-xs-12">
            <h1><span class="label label-primary">GET</span></h1>
        </div>
        <div class="col-md-6 col-xs-12" style="text-align: left">
            <p style="font-size: 200%">
                <b>/weather/province/{<mark>province</mark>}</b>
            </p>
            <ul>
                <li>replace space with underscore</li>
            </ul>
        </div>
        <div class="col-md-4 col-xs-12">
            <a target="_blank" href="{{ url('weather/province/samut_prakan') }}" class="btn btn-danger">
                Example
            </a>
        </div>
    </div>
    <hr>
    <div class="row" style="text-align: center">
        <div class="col-md-2 col-xs-12">
            <h1><span class="label label-primary">GET</span></h1>
        </div>
        <div class="col-md-6 col-xs-12" style="text-align: left">
            <p style="font-size: 200%">
                <b>/weather/location/{<mark>latitude</mark>}/{<mark>longitude</mark>}</b>
            </p>
            <ul>
                <li>latitude before longitude</li>
                <li>Ex. 13.809739,100.045359</li>
            </ul>
        </div>
        <div class="col-md-4 col-xs-12">
            <a target="_blank" href="{{ url('weather/location/13_809739/100_045359') }}" class="btn btn-danger">
                Example
            </a>

            <a target="_blank" href="{{ url('weather/send_weather_forecast/13_809739/100_045359') }}" class="btn btn-warning">
                Send To Cloud
            </a>
        </div>
    </div>
    <hr>
@stop