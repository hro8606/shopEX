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
                    @if(session('status'))
                        <div class="row">
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                    <div class="row col-md-12 card card-body">
                        <div class="row table-responsive">
                            <h2>All Products </h2>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>*</th>
                                    <th>title</th>
                                    <th>description</th>
                                    <th>category</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                    <th>discount_price</th>
                                    <th>Created At</th>
                                    <th>image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $prod)
                                    <tr>
                                        <td>{{$prod->id}}</td>
                                        <td>{{$prod->title}}</td>
                                        <td>{{$prod->description}}</td>
                                        <td>{{$prod->category}}</td>
                                        <td>{{$prod->quantity}}</td>
                                        <td>{{$prod->price}}</td>
                                        <td>{{$prod->discount_price}}</td>
                                        <td>{{$prod->created_at->diffForHumans()}}</td>
                                        <td>
{{--                                            <img class="img_size" src="../storage/{{$prod->image}}">--}}
                                            <img src="{{ url('storage/product/'.$prod->image) }}" alt="Image" title="" />
                                            </td>
                                        <td>
{{--                                            <a  class="btn btn-warning" href="{{route('edit_category',$prod->id)}}">Edit</a>--}}
{{--                                            <a onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger" href="{{route('delete_product',$prod->id)}}">Delete</a>--}}
                                            <form method="post" action="{{ route('product.destroy',$prod->id) }}" >
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger" type="submit">
                                                    Delete
                                                </button>
                                            </form>

                                        </td>
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
