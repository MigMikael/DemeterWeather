@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <img src="{{ asset('Demeter_Pic.jpg') }}" alt="Demeter Picture" width="20%" height="50%">
            <h3>Hello Human!, I'm Demeter</h3>
            <p>The goddess of the harvest and agriculture</p>
            <p>I can help you do many things.</p>
            <br>
            <a href="{{ url('weather') }}" class="btn btn-primary">Weather</a>
            <a href="" class="btn btn-success">Plant</a>
            <a href="https://persephoneweather.herokuapp.com/" class="btn btn-warning">Cloud</a>
        </div>
    </div>
@stop