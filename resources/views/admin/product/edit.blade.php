@extends('admin.home')

@section('content')

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
                            <h4 class="card-title">Adding New Product34343434</h4>
                            <p class="card-description"> Please add the product details </p>


                            <form class="forms-sample" method="POST" action="{{ route('product.update',$product->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="form-group">
                                    <label for="pr_title">Product Title<span>*</span></label>
                                    <input type="text" class="form-control" id="pr_title"
                                           placeholder="Name" name="title" required="" autofocus
                                           value="{{$product->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="pr_description">Product Description<span>*</span></label>
                                    <input type="text" class="form-control" id="pr_description"
                                           placeholder="Description" name="description" required=""
                                           value="{{$product->description}}">
                                </div>
                                <div class="form-group">
                                    <label for="pr_price">Product Price<span>*</span></label>
                                    <input type="number" min="0" class="form-control" id="pr_price"
                                           placeholder="Write a price" name="price" value="{{$product->price}}"
                                           required="">
                                </div>
                                <div class="form-group">
                                    <label for="pr_dis_price">Discount Price</label>
                                    <input type="number" min="0" class="form-control" id="pr_dis_price"
                                           placeholder="Discount price" name="discount_price"
                                           value="{{$product->discount_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="pr_quantity">Product Quantity<span>*</span></label>
                                    <input type="number" min="0" class="form-control" id="pr_quantity"
                                           placeholder="Quantity" name="quantity" value="{{$product->quantity}}"
                                           required="">
                                </div>


                                <div class="form-group">
                                    <label for="exampleSelect">Product Category<span>*</span></label>
                                    <select class="form-control" id="exampleSelect" name="category" required="">
                                        <option value="" selected="">Add a category here</option>
                                        @foreach($category as $cat)
                                            @if($cat->name == $product->category)
                                                <option selected value="{{ $cat->name }}">{{ $cat->name }}</option>
                                            @else
                                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-1">
                                    <label>Current Image(s) </label>
                                    <img class="ml-2" src="{{ url('storage/product/'.$product->image) }}" alt="Image"
                                         width="100px" title=""/>
                                </div>
                                <div class="form-group">
                                    <label>Change product Image </label>
                                    <input type="file" name="image[]" class="file-upload-default">
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
@endsection
