@extends('layout.main')

@section('title','Login')

@section('content')
<div class="card">
    <h5 class="card-header">登入</h5>
    <div class="card-body">
        <form method="POST" action="/login">
            {{ csrf_field() }}
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
            <div class="mb-3">
                <label for="UserNameInput" class="form-label">User Name or Email</label>
                <input type="text" class="form-control" id="UserNameInput" aria-describedby="usernameHelp" name="username">
            </div>
            <div class="mb-3">
                <label for="PasswordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="PasswordInput" aria-describedby="passwordHelp" name="password">
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
</div>
@endsection