@extends('layout')

@section('content')
    <h3>
        Contact 
    </h3>
    <p>
        Имя: {{$contact['name']}}
    </p>    
    <p>
        Адрес: {{$contact['address']}}
    </p>   
    <p>
        Телефон: {{$contact['phone']}}
    </p>   
    <p>
        Почта: {{$contact['email']}}
    </p>   
     
@endsection