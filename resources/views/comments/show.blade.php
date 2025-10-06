@extends('layout')
@section('content')
    <div class="card" style="min-width: 8rem; max-width: 170rem; margin: 2rem 0rem; ">
        <div class="card-body">
            <h5 class="card-title">Комментарий на статью "{{$article->title}}"</h5>
            <p class="card-text">{{$comment->text}}</p>
            <div class="btn-toolbar mt-3" role="toolbar">
                <a href="/articles/{{$article->id}}/comments/{{$comment->id}}/edit" class="btn btn-primary" style="margin-right: 1rem;">Изменить</a>
                <form action="/articles/{{$article->id}}/comments/{{$comment->id}}" method="post">
                    @METHOD("DELETE")
                    @CSRF
                    <button type="submit" class="btn btn-primary">Удалить</button>
                </form>
            </div> 
        </div>
    </div>
@endsection