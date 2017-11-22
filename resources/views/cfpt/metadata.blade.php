@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="row">
                    <div class="col-md-3">
                        <img id="logo" class="img-responsive" src="{{asset('img/logo-cfpt-site.png')}}">
                        <a href="https://edu.ge.ch/site/cfpt/">Centre de Formation Professionnelle et Technique d'Informatique</a>
                    </div>
                    <div class="col-md-9">
                        <img id="baniere"  src="{{asset('img/baniere.png')}}">
                        <div class="panel panel-default">
                            <div class="panel-heading">MetaDatas de l'image</div>
                            <div class="panel-body">
                                @foreach(exi->images as $image)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection