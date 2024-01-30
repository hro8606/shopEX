@extends('home.components.main')

@section('content')
    <div class="col-sm-6 col-md-4 col-lg-4 m-auto" style="width: 50%; padding: 30px">
        <div class="box">
            <div class="img-box p-2">
                <img src="{{ url('storage/product/'.$product->image) }}" alt="" style="width: -webkit-fill-available">
            </div>
            <div class="detail-box">
                <h5>
                    {{$product->title}}
                </h5>
                @if($product->discount_price)
                    <h6>
                         Price : <s>{{$product->price}} $ </s> <b>{{$product->discount_price}} $</b>
                    </h6>
                @else
                    <h6>
                        Price : {{$product->price}} Dram
                    </h6>
                @endif
                <h6>Product Category : {{$product->category}}</h6>
                <h6> Product Details : {{$product->description}}</h6>
                <h6>Available Quantity : {{$product->quantity}}</h6>

                <a href="" class="btn btn-primary">
                     Add to cart
                </a>

            </div>
        </div>
    </div>

@endsection
