<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <title>Add category</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Add category</h1>
        @foreach ($data as $category)
            
       

<form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="id">ID:</label>
        <input type="text" class="form-control" value="{{ $category->id }}" disabled id="id" name="id">
    </div>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" value="{{ $category->name }}" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="photo">photo:</label>
        <input type="file" class="form-control" value="{{ $category->photo }}" id="photo" name="photo">
    </div>
    <div class="form-group">
        <label for="desc">desg:</label>
        <input type="text" class="form-control" value="{{ $category->desc }}" id="desc" name="desc">
    </div>

  

    <button type="submit" class="btn btn-primary">Save</button>
</form>
 @endforeach
 <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>

    </div>
</body>
</html>
