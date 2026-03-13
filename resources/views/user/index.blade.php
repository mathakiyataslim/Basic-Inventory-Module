@extends('layout.app')
@section('title','Show User')
@section('content')
<div class="container mt-3">
        <h2 class="text-center fw-bold align-item-center pt-3 pb-3"> User's Record</h2>
        <a href="{{route('user.create')}}" class="btn btn-primary mb-2">user create</a>
        <table class="table  table-bordered table-hover pt-4 mb-3 text-center myTable ">
            <thead class="table-dark text-white">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>email</th>    
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user )
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                   
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-primary">{{$role->name}}</span>
                        @endforeach
                    </td>
                    <td>
                       
                        <form action="{{route('user.destroy',$user->id)}}" method="post">
                           @csrf
                           @method('DELETE')
                            <a href="{{route('user.edit',$user->id)}}" class="btn  btn-success ">Edit</a>
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection