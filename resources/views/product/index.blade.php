@extends('layout.app')
@section('title',"product list")
@section('content')

  
    <div class="container mt-3">
        <h2 class="text-center fw-bold align-item-center pt-3 pb-3">Display Product</h2>
        <a href="{{route('product.create')}}" class="btn btn-primary m-2">Create Product</a>
        <table class="table  table-bordered table-hover pt-4 mb-3 text-center myTable ">
            
            <thead class="table-dark text-white">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th> 
                            
                    <th>Description</th>  
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
 @endsection
 @push('js')
    <script>
        $(document).ready(function(){
            
            let table = $(".myTable").DataTable({
                processing:true,
                serverSide:true,
                ajax:"{{route('product.index')}}",
                columns:[
                    {data:'id',name:'id'},
                     {data:'image',name:'image'},
                    {data:'name',name:'name'},
                    {data:'price',name:'price'},
                   
                    {data:'description', name:'description'},       
                    {data:'action',name:'action',orderable:false,searchable:false},
                ]
            });
            console.log("table data ->",table);
        });
    </script>
 @endpush('js')