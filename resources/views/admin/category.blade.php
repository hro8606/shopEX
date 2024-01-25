<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container">
                    @if(session('status'))
                        <div class="row">
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="row col-md-12">
                            <h2>Category</h2>
                        </div>

                        <div class="row col-md-12 card-body">
                            <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                  action="{{ route('store_category') }}">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label for="category">Add category </label>
                                    <input type="text" id="category" name="category" class="form-control" required="">
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                    <div class="row col-md-12 ">
                        <div class="row">
                            <h2>All categories </h2>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td><a class="btn btn-danger" href="{{route('delete_category',$category->id)}}">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@include('admin.footer')

@include('admin.script')
</body>
</html>
