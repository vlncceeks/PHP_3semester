@extends('layout')
@section('content')
    <div class="card" style="min-width: 8rem; max-width: 170rem; margin: 2rem 0rem; ">
        <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <p class="card-subtitle mb-2 text-muted">{{$article->shortDesc}}</p>
            <p class="card-text">{{$article->desc}}</p>
            <p class="card-subtitle mb-2 text-muted">{{$article->datePublic}}</p>
            <div class="btn-toolbar mt-3" role="toolbar">
                <a href="/articles/{{$article->id}}/edit" class="btn btn-primary" style="margin-right: 1rem;">Изменить</a>
                <form action="/articles/{{$article->id}}" method="post">
                    @METHOD("DELETE")
                    @CSRF
                    <button type="submit" class="btn btn-primary">Удалить</button>
                </form>
            </div> 
        </div>
    </div>
    <a class="btn btn-outline-info" href="/articles/{{$article->id}}/comments/create">Оставить комментарий</a>
    <div class="card" style="min-width: 8rem; max-width: 170rem; margin: 2rem 0rem; padding: 1rem;" >
        <h5>Комментарии</h5>
        @include('comments.index', ['article' => $article])
        <!-- <iframe src="{{ route('articles.comments.index', $article) }}" 
                style="width:100%;"></iframe> -->
    </div>
@endsection