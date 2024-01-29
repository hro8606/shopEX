@extends('admin.home')

@section('content')

<div class="main-panel">
            <div class="content-wrapper">
                <div class="">
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
                                    <th>updated At</th>
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
                                        <td>{{$prod->updated_at->diffForHumans()}}</td>
                                        <td>
{{--                                            <img class="img_size" src="../storage/{{$prod->image}}">--}}
                                            <img src="{{ url('storage/product/'.$prod->image) }}" alt="Image" title="" />
                                            </td>
                                        <td style="display: flex">
                                            <a class="btn btn-warning mr-1" href="{{route('product.edit',$prod->id)}}">Edit</a>
                                            <form method="post" action="{{ route('product.destroy',$prod->id) }}" >
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger ml-1" type="submit">
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

@endsection
