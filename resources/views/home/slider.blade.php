<section class="slider_section ">
    <!-- carousel -->
    <div class="carousel">
        <!-- list item -->
        <div class="list">
            @foreach($slider as $row)
                <div class="item">
                    <img src="{{ url('storage/gallery/'.$row->image) }}" alt="Image" title="" />
                    <div class="content">
                        <div class="author">{{$row->author}}</div>
                        <div class="title">{{$row->title}}</div>
{{--                        <div class="topic">{{$row->topic}}</div>--}}
                        <div class="topic">{!! $row->topic !!}</div>
                        <div class="des">
                            {{$row->description}}
                        </div>
                        <div class="buttons">
                            @if($row->product_id)
                                <button><a href="{{route('product_details',$row->product_id)}}" class="option1">
                                        SEE MORE
                                    </a></button>
                            @endif

{{--                            <button>SUBSCRIBE</button>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
            @foreach($slider as $row)
                <div class="item">
                    <img src="{{ url('storage/gallery/'.$row->image) }}" alt="Image" title=""/>
                    <div class="content">
                        <div class="title">
                            {{$row->title}}
                        </div>
                        <div class="description block  overflow-hidden overflow-ellipsis ">
                            <span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch;"
                            >{{$row->description}}</span>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>
</section>
