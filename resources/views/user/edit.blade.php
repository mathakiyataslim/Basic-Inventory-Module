@extends('layout.app')
@section('title','Edit user')
@section('content')
<div class="container-fluid">
    <h2 class="text-center fw-bold pt-3">Edit user</h2>
    <div class="container d-flex justify-content-center">
        <form action="{{route('user.update',$user->id)}}" method="post" class="col-lg-4">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
           
            <div class="mb-2">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="">Select Role</option>

                    @foreach($roles as $role)
                    <option value="{{$role->id}}" 
                    {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                        {{$role->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mb-2 m-2">Submit</button>
        </form>
    </div>
</div>

@endsection