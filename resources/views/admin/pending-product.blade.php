@extends('layout.app')
@section('title','Show Pending Tasks')
@section('content')
<div class="container mt-3">
        <h2 class="text-center fw-bold align-item-center pt-3 pb-3">Pending Record</h2>
        <table class="table  table-bordered table-hover pt-4 mb-3 text-center myTable ">
            <span class="badge bg-success text-white rounded mb-2">{{ session('message') }}</span>
            <thead class="table-dark text-white">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Aprove Product</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody >
                @foreach($pendigpro as $penpro)
                <tr>
                 <td>{{$penpro->id}}</td>
                 <td><img src="{{asset('storage/'.$penpro->image)}}" alt="pendig products" width="70" height="70"></td>
                 <td>{{$penpro->name}}</td>
                 @if($penpro->status == 'pending')
                 <td class="badge bg-info mt-2">{{$penpro->status}}</td>
                 @else
                 <td class="badge bg-primary mt-2">{{$penpro->status}}</td>
                 @endif
                 <td>
                  <form action="{{route('admin.approve',$penpro->id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">Approved</button>

                  </form>
                  <form action="{{route('admin.rejected',$penpro->id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Reject</button>
                  </form>
                 
                 </td>
                </tr>


              @endforeach
            </tbody>
        </table>
    </div>

@endsection