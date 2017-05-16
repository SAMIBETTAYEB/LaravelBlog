@extends('layouts.app')

@section('content')
    <div class="container">
        @if($articles->count()<=0)
            <h1 class="alert alert-info text-center alert-dismissible">There is no articles to show!</h1>
        @else
        <table class="table table-responsive table-bordered">
            <tr>
                <th>Title</th>
                <th>Created time</th>
                <th>Edit</th>
            </tr>
            @foreach($articles as $article)
            <tr>
                <td><a href="article/{{$article->id}}">{{$article->title}} <span class="badge">{{$article->comments->count()}}</span></a></td>
                <td>{{$article->created_at}}</td>
                <td><a href="/articles/edit/{{$article->id}}">Edit</a></td>
            </tr>
            @endforeach
        </table>
            @endif
    </div>
@endsection
