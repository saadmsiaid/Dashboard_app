<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <title>Edit Product</title>
</head>
<body>  
    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @foreach ($data as $item)
            <form method="POST" action="{{ route('index.edit',$item->id) }}" enctype="multipart/form-data">
                @csrf 
                @method('PUT')

                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" id="id" value="{{$item->id}}" name="id" disabled>
                </div>

                <div class="form-group">
                    <label for="desg">Designation:</label>
                    <input type="text" class="form-control" id="desg" value="{{$item->desg}}" name="desg">
                </div>

                <div class="form-group">
                    <label for="qtes">Quantity:</label>
                    <input type="number" class="form-control" id="qtes" value="{{$item->qtes}}" name="qtes">
                </div>

                <div class="form-group">
                    <label for="pu">Price:</label>
                    <input type="number" class="form-control" id="pu" value="{{$item->pu}}" name="pu">
                </div>

                <div class="form-group">
                    <label for="photo">Photo:</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                    <small class="text-danger">
                        @error('photo')
                            {{$message}}
                        @enderror
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">Edit Product</button>
            </form>
        @endforeach
        <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>

    </div>

</body>
</html>
