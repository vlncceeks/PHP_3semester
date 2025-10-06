@extends('layout')

@section('content')
    <h2>Оставьте комментарий на статью</h2>
    <form action="/articles/{{$article->id}}/comments" method="POST">
        @CSRF
        @METHOD('POST')

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Комментарий</label>
            <textarea name="text" class="form-control" required></textarea>
        </div>
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection