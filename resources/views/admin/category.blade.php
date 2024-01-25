<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
    <style type="text/css">
        .div_center{
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
    <h2>@if($status)
            {{$status}}
        @endif</h2>

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="row col-md-12">
                        <h2>Category</h2>
                    </div>

                    <div class="row col-md-6 card-body">
                        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('store_category') }}">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="category">Add category </label>
                                <input type="text" id="category" name="category" class="form-control" required="">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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
