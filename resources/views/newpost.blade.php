@extends('layout.main')

@section('title','編輯文章')

@section('content')
<div class="card">
    
    <h5 class="card-header">
        @if (request()->routeIs('post'))
            新增文章
        @elseif (request()->routeIs('post.edit'))
            編輯文章
        @endif
    </h5>
    <div class="card-body">
        <form method="POST" action="{{ route('post.store')}}">
            {{ csrf_field() }}
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
            <div class="mb-3">
                <label for="TitleInput" class="form-label">標題</label>
                <input type="text" class="form-control" id="TitleInput" aria-describedby="titleHelp" name="title">
                <div id="titleHelp" class="form-text">標題要5~25個字</div>
            </div>
            <div class="mb-3">
                <label for="ContentInput" class="form-label">內容</label>
                <textarea class="form-control" id="ContentInput" rows="3" aria-describedby="contentHelp" name="content"></textarea>
                <div id="contentHelp" class="form-text">內容要5~255個字</div>
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
</div>
@endsection