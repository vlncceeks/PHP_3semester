@extends('layout')

@section('content')
    <h2>Комментари</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Author</th>
                <th scope="col">Article</th>
                <th scope="col">Text</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <th scope="row">{{ $comment->created_at }}</th>
                    <td>{{App\Models\User::FindOrFail($comment->user_id)->name}}</td>
                    <td><a href="articles/{{App\Models\Article::FindOrFail($comment->articles_id)->id}}">{{App\Models\Article::FindOrFail($comment->articles_id)->title}}</a></td>
                    <td>{{$comment->text}}</td>
                    <td>
                        @if(!$comment->accept)  
                            <a href="/comments/accept/{{$comment->id}}" class="btn btn-primary">Accept</a>
                        @else
                            <a href="/comments/reject/{{$comment->id}}" class="btn btn-warning">Reject</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection