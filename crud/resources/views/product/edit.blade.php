<!doctype html>
<html lang="en">
  <head>
    <title>Laravel Crud Operation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Laravel_Crud</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Product</a>
                </li>
            </ul>
        </div>
      </nav>
      @if($message = Session::get('Success'))
      <div class="alert alert-success alert-block">
          <strong>{{$message}}</strong>
      </div>
      @endif
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
              <div class="card mt-3 p-3">
                <form action="/update/{{$product->id}}/product" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="" class="form-control" value="{{old('name', $product->name)}}">
                    @if($errors->has('name'))
                      <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" id="" cols="3" rows="4">{{old('description', $product->description)}}</textarea>
                    @if($errors->has('description'))
                      <span class="text-danger">{{$errors->first('description')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="" class="form-control">
                    @if($errors->has('image'))
                      <span class="text-danger">{{$errors->first('image')}}</span>
                    @endif
                  </div>
                  <button type="submit" class="btn btn-dark">Submit</button>
                </form>
              </div>
            </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>