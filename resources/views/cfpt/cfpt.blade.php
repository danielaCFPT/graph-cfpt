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
                                    <button type="submit" class="btn btn-primary">
                                        <i id="disquette" aria-hidden="true"></i>
                                    </button>
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
                                            <div align="right">
                                                <form method="Post">
                                                    <a href="{{ route('delete', ['id'=>$item->id]) }}">
                                                        <button type="button" class="btn btn-default" id="supCom" name="supCom">
                                                            <i id="poubelle" aria-hidden="true"></i>

                                                        </button>
                                                    </a>
                                                </form>


                                                <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#Modal{{$item->id}}" id="supCom" name="supCom">
                                                    <i id="crayon" aria-hidden="true"></i>
                                                        </button>

                                                    <div class="modal fade" id="Modal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
                                                                </div>
                                                                <form method="post" enctype="multipart/form-data" action="{{ route('edit', ['id'=>$item->id]) }}">
                                                                <div class="modal-body">
                                                                    {{csrf_field()}}
                                                                        <div class="form-group">
                                                                            <label for="message-text" class="col-form-label">Comment :</label>
                                                                            <textarea class="form-control" id="EditComment" name="EditComment">{{$item->comment}}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="col-form-label">Images :</label>
                                                                            <div class="row">
                                                                                @foreach($item->images as $image)
                                                                                    <div class="left">
                                                                                        <img class="" src="storage/{{$image->image}}" height="100" width="150">
                                                                                        <label class="checkbox-inline">
                                                                                            <input type="checkbox" value="{{$image->id}}" id="imgSelect" name="imgSelect[]">
                                                                                        </label>
                                                                                    </div>

                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="choiseImage">Ajouter une image</label>
                                                                            <input type="file" class="form-control-file" name="images[]" id="images" accept="image/*" multiple>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div id="collapseOne" class=" show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card" style="width: 100%">

                                                    <div class="row">
                                                        @foreach($item->images as $image)
                                                            <a class="col-md-3 thumbnail" data-fancybox="gallery" rel="lightbox" href="storage/{{$image->image}}">
                                                                <img class="" src="storage/{{$image->image}}">
                                                            </a>
                                                        @endforeach
                                                    </div>
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