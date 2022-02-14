@extends('layout.main')

@section('title',$post->title)

@section('content')

    <div class="card mt-3">
        <div class="card-header">
            <h4 class="d-inline">{{$post->title}}</h5>
            <h6 class="d-inline ">作者:{{$post->author}}  最後更新時間:{{$post->updated_at}}</h6>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <p>{{$post->content}}</p>
            </blockquote>
        </div>
    </div>
@endsection