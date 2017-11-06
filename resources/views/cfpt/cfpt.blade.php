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
                                <form method="Post" enctype="multipart/form-data" action="{{ url('/upload') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Commentaire</label>
                                        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="choiseImage">Choisir une image</label>
                                        <input type="file" class="form-control-file" name="images[]" id="images" accept="image/*" multiple>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Poster</button>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="accordion" role="tablist">
                                    {{--@foreach($comment->images as $image)--}}
                                    @foreach($comments as $item)
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
                                                @foreach($item->images as $image)
                                                <img class="img-responsive" src="{{asset("storage/$image->image")}}" alt="Card image cap">
                                                @endforeach
                                                <div class="card-body">

                                                    <p class="card-text">{{$item->comment}}</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--@endforeach--}}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection