@extends('layout.app')
@section('title','Show Permission')
@section('content')
<div class="container mt-3">
        <h2 class="text-center fw-bold align-item-center pt-3 pb-3"> User's Record</h2>
        <a href="{{route('permission.create')}}" class="btn btn-primary mb-2">user create</a>
        <table class="table  table-bordered table-hover pt-4 mb-3 text-center myTable ">
            <thead class="table-dark text-white">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($permissions as $permission)
              <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
              
                <td>
                   
                    <form action="{{route('permission.destroy',$permission->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('permission.edit',$permission->id)}}" class="btn btn-info">Edit</a>
                  
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach

              
            </tbody>
        </table>
    </div>

@endsection