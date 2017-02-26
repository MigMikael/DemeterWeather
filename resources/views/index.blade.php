@extends('template')

@section('content')
    <div class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
        <div class="row">
            <div class="jumbotron" style="text-align: center; background: #424242">
                <h1>Demetor Control Panel</h1>
                <hr>
                <p>Demeter will automatically send weather and plant data to cloud every 5 min.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default" style="background: #000000">
                    <div class="panel-heading" style="text-align: center; background-color: #424242; color: #ffffff">
                        <h1>Weather Data</h1>
                    </div>
                    <div class="panel-body" style="text-align: center">
                        <div class="col-md-12 col-xs-12">
                            <div class="col-md-6">
                                <p><b>Manually Send Data</b></p>
                                <a href="{{ url('send_data') }}" class="btn btn-primary btn-lg btn-block">Send</a>
                            </div>
                            <div class="col-md-6">
                                <p><b>View Data in JSON</b></p>
                                <a href="{{ url('weather_data') }}" target="_blank" class="btn btn-default btn-lg btn-block">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" style="background: #000000">
                    <div class="panel-heading" style="text-align: center; background-color: #424242; color: #ffffff">
                        <h1>Plant Data</h1>
                    </div>
                    <div class="panel-body" style="text-align: center">
                        <div class="col-md-12 col-xs-12">
                            <div class="col-md-6">
                                <p><b>Manually Send Data</b></p>
                                <a href="{{ url('send_data') }}" class="btn btn-success btn-lg btn-block">Send</a>
                            </div>
                            <div class="col-md-6">
                                <p><b>View Data in JSON</b></p>
                                <a href="{{ url('plant_data') }}" target="_blank" class="btn btn-default btn-lg btn-block">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop