@extends('layout.main')

@section('title','Sign Up')

@section('content')
<div class="card">
    <h5 class="card-header">註冊</h5>
    <div class="card-body">
        <form method="POST" action="/signup">
            {{ csrf_field() }}
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
            <div class="mb-3">
                <label for="UserNameInput" class="form-label">User Name</label>
                <input type="text" class="form-control" id="UserNameInput" aria-describedby="usernameHelp" name="username">
                <div id="usernameHelp" class="form-text">帳號必須要5~10位數</div>

            </div>
            <div class="mb-3">
                <label for="EamilInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="EamilInput" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="PasswordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="PasswordInput" aria-describedby="passwordHelp" name="password">
                <div id="passwordHelp" class="form-text">密碼必須要8~10位數</div>
            </div>
            <div class="mb-3">
                <label for="ConfirmPasswordInput" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="ConfirmPasswordInput" aria-describedby="confirmpasswordHelp" name="password_confirmation">
                <div id="passwordHelp" class="form-text">再輸入一次密碼</div>
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
</div>
@endsection