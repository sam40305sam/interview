@extends('layout.main')

@section('title','管理使用者')

@section('content')
<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">工具</th>
            </tr>
            </thead>
            <tbody>
                
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{\App\Models\Role::get_role_type($user->roles_id)}}</td>
                    <td>
                        <div class="dropdown d-inline ">
                            <button class="btn btn-primary  dropdown-toggle btn-sm " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                工具
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @can('update',$user)
                                    <li>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal{{$user->id}}">
                                            編輯權限
                                        </button>
                                    </li>
                                @else
                                    <li><a class="dropdown-item" href="">無</a></li>
                                @endcan
                                @can('delete',$user)
                                    <li>
                                        <form action="{{route('users.delete',$user->id)}}" method="POST" id="deleteform{{$user->id}}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="dropdown-item" id="ConfirmDelete" >刪除使用者</button>
                                            @method("delete")
                                        </form>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="editModal{{$user->id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('users.edit')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">更改{{$user->name}}的權限</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-check">
                                        <input type="hidden" name="userid" value="{{$user->id}}">
                                        <input class="form-check-input" type="radio" name="roles_id" value="1" id="rolesid1" {{($user->roles_id==\App\Models\Role::IS_ADMIN)?"checked":""}}>
                                        <label class="form-check-label" for="rolesid1">
                                            ADMIN
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="roles_id" value="0" id="rolesid0" {{($user->roles_id==\App\Models\Role::IS_USER)?"checked":""}} >
                                        <label class="form-check-label" for="rolesid0">
                                            USER
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                
                                @method("patch")
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    $('#deleteform{{$user->id}}').submit(function() {
                        if(confirm("確定刪除嗎")){
                            alert("刪除成功");
                            return true;
                        }
                        return false;
                    });
                </script>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection