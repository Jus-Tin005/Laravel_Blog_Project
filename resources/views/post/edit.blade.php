<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <style type="text/css">
                body {
                        padding: 100px;
                }
        </style>
</head>
<body>
<!-- <h1>Hello i am edit page</h1>  -->

<div class="container">
        <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <h5>Update Post</h5>
                        <form action="{{ route('posts.update',$post->id) }}" method="POST">
                                <!-- {{ url('posts/' . $post->id) }} -->
                                {{ csrf_field() }}  <!-- laravel security code -->
                                @method('PUT')                                <!-- declaring for put because pure html can't accept put and patch method -->
                                <div class="form-group">
                                        <label for="title">Title</label>                                                                                                        <!-- ?? = or  -->
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Your Post Title" value="{{ $post -> title ?? old('title') }}">
                                        @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea name="content" id="content" rows="3" class="form-control @error('content') is-invalid @enderror" placeholder="Enter Your Content">{{ $post -> content ?? old('content') }}</textarea>
                                        @error('content')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                        </form>
                </div>
                <div class="col-md-3"></div>
        </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>