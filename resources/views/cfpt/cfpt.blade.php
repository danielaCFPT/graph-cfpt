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
                            <div class="panel-heading">Commentaire</div>
                            <div class="panel-body">
                                <form>
                                    <div class="form-group">
                                        <label>Commentaire</label>
                                        <textarea class="form-control" rows="5" id="comment"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="choiseImage">Choisir une image</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1" >
                                    </div>
                                    <button type="submit" class="btn btn-primary">Poster</button>
                                </form></div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="accordion" role="tablist">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Collapsible Group Item #1
                                                </a>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card" style="width: 100%">
                                                <img class="img-responsive" src="{{asset('img/renard.jpg')}}" alt="Card image cap">
                                                <div class="card-body">
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection