@extends('home.components.main')

@section('content')
    <div class="gallery_section">
        <div class="heading_container heading_center mt-4">
            <h2>
                GALLERY
            </h2>
        </div>
        <div class="container">
            <div class="gallery">
                <a href="{{asset("images/gallery/1.jpg")}}" data-lightbox="models" data-title="Caption1">
                    <img src="{{asset("images/gallery/1.jpg")}}" alt="">
                </a>
                <a href="{{asset("images/gallery/2.jpg")}}" data-lightbox="models" data-title="Caption1">
                    <img src="{{asset("images/gallery/2.jpg")}}" alt="">
                </a>
                <a href="{{asset("images/gallery/3.jpg")}}" data-lightbox="models" data-title="Caption1">
                    <img src="{{asset("images/gallery/3.jpg")}}" alt="">
                </a>
                <a href="{{asset("images/gallery/4.jpg")}}" data-lightbox="models" data-title="Caption1">
                    <img src="{{asset("images/gallery/4.jpg")}}" alt="">
                </a>
                <a href="{{asset("images/gallery/5.jpg")}}" data-lightbox="models" data-title="Caption1">
                    <img src="{{asset("images/gallery/5.jpg")}}" alt="">
                </a>
                <a href="{{asset("images/gallery/6.jpg")}}" data-lightbox="models" data-title="Caption1">
                    <img src="{{asset("images/gallery/6.jpg")}}" alt="">
                </a>
                <a href="{{asset("images/gallery/7.jpg")}}" data-lightbox="models" data-title="Caption1">
                    <img src="{{asset("images/gallery/7.jpg")}}" alt="">
                </a>
                <a href="{{asset("images/gallery/8.jpg")}}" data-lightbox="models" data-title="Caption1">
                    <img src="{{asset("images/gallery/8.jpg")}}" alt="">
                </a>


            </div>
        </div>
    </div>

    {{--                <h6>Product Category : {{$product->category}}</h6>--}}
    {{--                <h6> Product Details : {{$product->description}}</h6>--}}
    {{--                <h6>Available Quantity : {{$product->quantity}}</h6>--}}


@endsection
