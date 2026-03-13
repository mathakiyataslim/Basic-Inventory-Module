@extends('layout.app')
@section('title','category')
@section('content')
<body>
    <div class="container mt-5 shadow rounded">
        <h2 class="text-center fw-bold pt-2 pb-3">Display Category</h2>
        <a href="{{route('category.create')}}" class="btn btn-primary mb-2">Create</a>
        <table class="table  table-border table:hover pt-3  ">
            <thead class="table-dark text-white">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->name}}</td>
                        <td>
                            
                            <form action="{{route('category.destroy',$cat->id)}}" method="post">
                                @csrf
                                @method('Delete')
                                <a href="{{route('category.edit',$cat->id)}}" class="btn btn-primary">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <!-- <a href="{{route('category.destroy',$cat->id)}}" class="btn btn-danger">Delete</a> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection