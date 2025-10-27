@extends('layout')

@section('content')
    <h2>Вход</h2>
    <form action="/auth/authenticate" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Почта</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
@endsection