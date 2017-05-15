@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{isset($article)?"Edit the article":"Add a new Article"}}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{isset($article)?"/articles/edit/":"/articles/add"}}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title')?old('title'):isset($article->title)?$article->title:"" }}" required autofocus>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" required>{{old('description')?old('description'):isset($article->content)?$article->content:""}}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @if(isset($article))
                            <input type="hidden" name="id" value="{{$article->id}}">
                            @endif


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit this article
                                    </button>

                                </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
