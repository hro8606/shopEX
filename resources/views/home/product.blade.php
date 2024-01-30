<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">

            @foreach($product as $prod)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{route('product_details',$prod->id)}}" class="option1">
                                    About
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{ url('storage/product/'.$prod->image) }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$prod->title}}
                            </h5>
                            @if($prod->discount_price)
                                <h6>
                                    <s>{{$prod->price}} $ </s> <b>{{$prod->discount_price}} $</b>
                                </h6>
                            @else
                                <h6>
                                    {{$prod->price}} Dram
                                </h6>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <span class="m-2">
        {!!$product->appends(Request::all())->links('pagination::bootstrap-5')!!}
        </span>


        <div class="btn-box">
            <a href="#">
                View All products
            </a>
        </div>
    </div>
</section>
