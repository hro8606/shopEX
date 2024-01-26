<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
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
                    @if(session('message'))
                        <div class="row">
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        </div>
                    @endif

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Adding New Product</h4>
                                <p class="card-description"> Please add the product details </p>
                                <form class="forms-sample" method="post" action="{{ route('store_product') }}"
                                      enctype="multipart/form-data">

                                    @csrf

                                    <div class="form-group">
                                        <label for="pr_title">Product Title</label>
                                        <input type="text" class="form-control" id="pr_title"
                                               placeholder="Name" name="title" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="pr_description">Product Description</label>
                                        <input type="text" class="form-control" id="pr_description"
                                               placeholder="Description" name="description" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="pr_price">Product Price</label>
                                        <input type="number" min="0" class="form-control" id="pr_price"
                                               placeholder="Write a price" name="price" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="pr_dis_price">Discount Price</label>
                                        <input type="number" min="0" class="form-control" id="pr_dis_price"
                                               placeholder="Discount price" name="dis_price">
                                    </div>
                                    <div class="form-group">
                                        <label for="pr_quantity">Product Quantity</label>
                                        <input type="number" min="0" class="form-control" id="pr_quantity"
                                               placeholder="Quantity" name="quantity" required="">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleSelect">Product Category</label>
                                        <select class="form-control" id="exampleSelect" name="category" required="">
                                            <option value="" selected="">Add a category here</option>
                                            @foreach($category as $cat)
                                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Image Here</label>
                                        <input type="file" name="image[]" required="" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info"
                                                   placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                            </span>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-dark">Cancel</button>
                                </form>
                            </div>
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
<script src="/admin/assets/js/file-upload.js"></script>

</body>
</html>
