<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index page</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

       <style>
                body {
                        padding: 100px;
                }
       </style>

</head>
<body>

<h1 class="text-success">Hello I am index</h1>


<div class="container">
        <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                        <h5>Posts Lists</h5>
                        <a href="{{ route('posts.create') }}">
                        <!-- {{ url('/posts/create') }} -->
                                <button class="btn btn-primary btn-sm float-right mb-2">
                                <i class="fas fa-plus-circle"></i>Add New
                                </button>
                        </a>

                        @if(Session('successAlert'))
                        <div class="alert alert-success alert-dismissible show fade">
                                <strong>{{ Session('successAlert') }}</strong>
                                <button class="close" data-dismiss="alert">&times;</button>
                        </div>
                        @endif

                        <table class="table table-bordered table-hover">
                                <thead>
                                        <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Actions</th>
                                        </tr>
                                </thead>

                                <tbody>
                                        @foreach($posts as $post)
                                                <tr>
                                                        <td>{{ $post->id }}</td>
                                                        <td>{{ $title }}</td>
                                                        <td>{{ $post->content }}</td>
                                                        <td>
                                                               <form action="{{ url('posts/' . $post->id) }}" method="POST"> <!-- url = . and route = ,   -->
                                                                        @csrf
                                                                        @method('DELETE');
                                                                        <a href="{{ route('posts.edit',$post->id) }}">
                                                                                <!-- {{ url('posts/' . $post->id . '/edit') }} -->
                                                                                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Edit</button>
                                                                        </a>
                                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete ?')"><i class="fas fa-trash-alt"></i>Delete</button>
                                                               </form>
                                                        </td>
                                                </tr>
                                        @endforeach
                                </tbody>
                        </table>
                        {{ $posts->links() }}
                </div>
                <div class="col-md-2"></div>
        </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>