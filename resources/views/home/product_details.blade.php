@extends('home.components.main')

@section('content')
    <div class="product_details">
        <div class="container">
            <div class="title">PRODUCT DETAIL</div>
            <div class="detail">
                <div class="image">
                    <img src="{{ url('storage/product/'.$product->image) }}">
                </div>
                <div class="content">
                    <h1 class="name">{{$product->title}}</h1>
                    @if($product->discount_price)
                        <div class="price">{{$product->discount_price}}</div>
                    @else
                        <div class="price">{{$product->price}} Dram</div>
                    @endif

                    <div class="buttons">
                        <button>Check Out</button>
                        <button>Add To Cart
                            <span>
                            <svg class="" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
                            </svg>
                        </span>
                        </button>
                    </div>
                    <div class="description">{{$product->description}}</div>
                </div>
            </div>

            <div class="title">Similar product</div>
            <div class="listProduct"></div>
        </div>
    </div>

    {{--                <h6>Product Category : {{$product->category}}</h6>--}}
    {{--                <h6> Product Details : {{$product->description}}</h6>--}}
    {{--                <h6>Available Quantity : {{$product->quantity}}</h6>--}}

@endsection
