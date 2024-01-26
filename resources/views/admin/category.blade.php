@extends('admin.home')

@section('content')

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
                    <div class="row col-md-12 card card-body">
                        <div class="row table-responsive">
                            <h2>All categories </h2>
                            <table class="table table-bordered table-hover">
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
                                        <td><a onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger" href="{{route('delete_category',$category->id)}}">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
