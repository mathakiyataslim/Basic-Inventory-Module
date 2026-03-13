<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>create</title>
</head>
<body>
    <div class="container-fluid ">
        <h2 class="text-center fw-bold pt-3">Edit Product</h2>
        <div class="container d-flex justify-content-center" >
            <form action="{{route('product.update',$product->id)}}" method="post" class="col-lg-6 p-3 shadow rounded " enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-2">
                    <label for="image" class="form-label">Image</label>
                    <div class="old-image mb-2">
                        <img src="{{asset('storage/'.$product->image)}}" alt="image" width="100" height="100" style="object-fit:contain;">
                    </div>
                     <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}">
                </div>
                <div class="mb-2">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" id="price" value="{{$product->price}}">
                </div>
                <div class="mb-2">
                    <label for="description" class="form-label">Description</label>
                    
                    <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
                </div>
                <div class="mb-2">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="" class="form-select mb-2">
                       
                        @foreach($categories as $cat)
                        <option value="{{$cat->id}}"> {{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
</body>
</html>