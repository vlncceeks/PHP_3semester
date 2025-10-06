@extends('layout')

@section('content')
    <h2>Изменение комментария под статьей "{{$article->title}}"</h2>
    <form action="/articles/{{$article->id}}/comments/{{$comment->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Текст</label>
            <input name="text" type="text" class="form-control" id="exampleInputPassword1" 
                value="{{$comment->text}}" required>
        </div>
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection