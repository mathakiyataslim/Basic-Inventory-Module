
@extends('layout.app')
@section('title','Add Permission')
@section('content')
<div class="container-fluid">
    <h2 class="text-center fw-bold pt-3">Add Permission</h2>
    <div class="container d-flex justify-content-center">
        <form action="{{route('permission.update',$permission->id)}}" method="post" class="col-lg-4">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{$permission->name}}">
            </div>
            

            <button type="submit" class="btn btn-primary mb-2 m-2">Submit</button>
        </form>
    </div>
</div>

@endsection