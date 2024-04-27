<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <title>Add Product</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Add Product</h1>

        <form method="POST" action="{{ route('index.store') }}" enctype="multipart/form-data">
            @csrf 

            <div class="form-group">
                <label for="desg">Designation:</label>
                <input type="text" class="form-control" id="desg" name="desg">
            </div>
            
            <div class="form-group">
                <label for="qtes">Quantity:</label>
                <input type="number" class="form-control" id="qtes" name="qtes">
            </div>

            <div class="form-group">
                <label for="pu">Price:</label>
                <input type="number" class="form-control" id="pu" name="pu">
            </div>
            
            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category">
                    @foreach($data as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" class="form-control" name="photo" value="{{old('photo')}}"> <span class="text-danger">
                    @error('photo')
                        {{$message}}
                    @enderror
                </span>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</body>
</html>
