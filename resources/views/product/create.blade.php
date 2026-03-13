@extends('layout.app')
@section('title','create')
@section('content')
    <div class="container-fluid ">
        <h2 class="text-center fw-bold pt-3">Add Product</h2>
        <div class="container d-flex justify-content-center" >
            <form action="{{route('product.store')}}" method="post" class="col-lg-6 p-3 shadow rounded " enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="mb-2">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" id="price">
                </div>
                <div class="mb-2">
                    <label for="description" class="form-label">Description</label>
                    
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="mb-2">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="" class="form-select mb-2">
                        <option value="">Select</option>
                        @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
@endsection