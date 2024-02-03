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
                @foreach($images as $img)
                    <a href="{{url('storage/gallery/'.$img->image)}}" data-lightbox="models" data-title="{{$img->title}}">
                        <img src="{{ url('storage/gallery/'.$img->image) }}" alt="Image"  />
                    </a>
                @endforeach

            </div>
        </div>
    </div>
@endsection
