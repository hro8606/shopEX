@extends('admin.home')

@section('content')

<div class="main-panel">
            <div class="content-wrapper">
                <div class="gallery_admin_section">
                    @if(session('status'))
                        <div class="row">
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                    <div class="row col-md-12 card card-body">
                        <div class="row table-responsive">
                            <h2>Gallery information </h2>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>


                                    <th>*</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Appear In slider</th>
                                    <th>Connected product</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($gallery_rows as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>{{$row->author}}</td>
                                        <td>{{$row->topic}}</td>
                                        <td class="break-words">{{$row->description}}</td>
                                        <td>

                                            @if($row->add_in_slider)
                                                Appear in Slider
                                            @else
                                             In Gallery
                                           @endif
                                        </td>
                                        <td>{{$row->product_id}}</td>
                                        <td>{{$row->created_at->diffForHumans()}}</td>
                                        <td>{{$row->updated_at->diffForHumans()}}</td>
                                        <td>
{{--                                            <img class="img_size" src="../storage/{{$row->image}}">--}}
                                            <img src="{{ url('storage/gallery/'.$row->image) }}" alt="Image" title="" class="gallery_image" />
                                            </td>
                                        <td style="display: flex">
                                            <a class="btn btn-warning mr-1" href="{{route('gallery.edit',$row->id)}}">Edit</a>
                                            <form method="post" action="{{ route('gallery.destroy',$row->id) }}" >
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
                    <div class="popup_image">
                        <span>&times;</span>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>

@endsection
