@extends('layout')

@section('content')
    <h2>Создание статьи</h2>
    <form action="/articles/" method="POST">
        @CSRF
        @METHOD('POST')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Название</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Дата публикации</label>
            <input name="datePublic" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Краткое описание</label>
            <input name="shortDesc" type="text" class="form-control" id="exampleInputPassword1"  required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Полное описание</label>
            <textarea name="desc" class="form-control" required></textarea>
        </div>
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection