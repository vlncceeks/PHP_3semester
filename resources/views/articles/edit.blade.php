@extends('layout')

@section('content')
    <h2>Изменение статьи</h2>
    <form action="/articles/{{$article->id}}/" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Название</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                value="{{$article->title}}" required>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Дата публикации</label>
            <input name="datePublic" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                value="{{$article->datePublic}}" required>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Краткое описание</label>
            <input name="shortDesc" type="text" class="form-control" id="exampleInputPassword1" 
                value="{{$article->shortDesc}}" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Полное описание</label>
            <textarea name="desc" class="form-control" required>{{$article->desc}}</textarea>
        </div>
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection