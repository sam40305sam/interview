@extends('layout.main')

@section('title','Home')

@section('content')

@foreach($posts as $post)
    <div class="card mt-3">
        <div class="card-header">
            <h4 class="d-inline">{{$post->title}}</h5>
            <h6 class="d-inline ">作者:{{$post->author}}  最後更新時間:{{$post->updated_at}}</h6>
            @can('view',$post)
                <div class="dropdown d-inline float-end">
                    <button class="btn btn-primary  dropdown-toggle btn-sm " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        工具
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @can('update',$post)
                        <li><a class="dropdown-item" href="{{ route('post.edit',$post->id)}}">編輯</a></li>
                        @endcan
                        @can('delete',$post)
                        {{-- <li>
                            <form action="{{route('post.delete',$post->id)}}" method="POST">
                                <button type="submit" class="dropdown-item" id="ConfirmDelete" >刪除</button>
                            </form>
                        </li> --}}
                        @endcan
                    </ul>
                </div>
            @endcan
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <p>{{substr($post->content, 0, 50)}} {{ (strlen($post->content)>50) ? '...' : '' }}</p>
            </blockquote>
            <a href="/post/{{$post->id}}" class="btn btn-outline-primary btn-sm">查看更多</a>
        </div>
    </div>
@endforeach
<div class="mt-3">
    {{ $posts->links() }}
</div>
<script>
    $("#ConfirmDelete").click(function(){
        if(confirm("確定刪除嗎")){
            alert("刪除成功");
            return true;
        }
        return false;
    });
</script>
@endsection