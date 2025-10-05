@extends('layout')
@section('content')
    <div class="card" style="min-width: 8rem; max-width: 170rem">
        <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <p class="card-subtitle mb-2 text-muted">{{$article->shortDesc}}</p>
            <p class="card-text">{{$article->desc}}</p>
            <p class="card-subtitle mb-2 text-muted">{{$article->datePublic}}</p>
            <div class="btn-toolbar mt-3" role="toolbar">
                <a href="/articles/{{$article->id}}/edit" class="btn btn-primary">Изменить</a>
                <form action="/articles/{{$article->id}}" method="post">
                    @METHOD("DELETE")
                    @CSRF
                    <button type="submit" class="btn btn-primary">Удалить</button>
                </form>
            </div> 
        </div>
    </div>
@endsection