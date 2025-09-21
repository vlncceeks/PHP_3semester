@extends('layout')

@section('content')
    <h2>Hello! I'm your first Laravel project</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Name</th>
                <th scope="col">ShortDesc</th>
                <th scope="col">Desc</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <th scope="row">{{ $article['date'] }}</th>
                    <td>{{ $article['name'] }}</td>
                    <td>{{ $article['shortDesc'] ?? '-' }}</td>
                    <td>{{ $article['desc'] }}</td>
                    <td><a href="/galery/{{$article['full_image']}}"><img alt="preview_image" src="{{URL::asset('/images/'.$article['preview_image'] )}}" height="100" width="100"> </a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection