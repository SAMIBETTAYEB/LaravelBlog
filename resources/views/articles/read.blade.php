@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!isset($article) || !is_object($article) || $article==NULL)
            <div class="alert alert-danger text-center">
                <h2><strong>This page isn't available</strong></h2>
            <h3>The link you followed may be broken, or the page may have been removed.</h3>
            </div>
        @else
        <div class="panel panel-default panel-info">
            <div class="panel-heading">
                <div class="panel-title"><h3 class="text-center text-center"><strong>{{$article->title}}</strong></h3></div>
            </div>
            <div class="panel-body">
                <p>{{$article->content}}</p>
                <hr>
                <div class="text-center">
                    <a class="btn btn-primary" href="/articles/edit/{{$article->id}}">Edit</a>
                </div>
            </div>
            <div class="panel-footer text-right">
                {{$article->users->name}}
                <br>
                Created at:{{$article->created_at}}
                @if($article->created_at!=$article->updated_at)
                    <br>
                    Updated at: {{$article->updated_at}}
                @endif
            </div>
        </div>


        @foreach($comments as $comment)

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title"><strong>{{$comment->users->name}}</strong></div>
                </div>
                <div class="panel-body">
                    {{$comment->content}}
                </div>
                <div class="panel-footer text-right">
                    {{$comment->created_at}}
                </div>
            </div>

        @endforeach


        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title"><strong>Comments</strong></div>
            </div>
            <div class="panel-body">
                <form method="post" action="addComment/{{$article->id}}" role="form" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea class="form-control" id="comment" name="comment" placeholder="Type your comment here...">
                        </textarea>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Add comment</button>
                </form>
            </div>
        </div>
@endif




    </div>


@endsection
