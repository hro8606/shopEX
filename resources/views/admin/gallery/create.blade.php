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
                            <h4 class="card-title">Adding Gallery Item </h4>
                            <p class="card-description"> Please add the Item details </p>
                            <form class="forms-sample" method="post" action="{{ route('gallery.store') }}"
                                  enctype="multipart/form-data">

                                @csrf
                                <div class="form-group">
                                    <label for="it_title">Item Title <span>*</span></label>
                                    <input type="text" class="form-control" id="it_title"
                                           placeholder="Name" name="title" required="">
                                </div>
                                <div class="form-group">
                                    <label for="it_author">Item Author <span>*</span></label>
                                    <input type="text" class="form-control" id="it_author"
                                           placeholder="Name" name="author" required="">
                                </div>

                                <div class="form-group">
                                    <label for="it_description">Item Description <span>*</span></label>
                                    <input type="text" class="form-control" id="it_description"
                                           placeholder="Description" name="description" required="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleSelect">Item Category <span>*</span></label>
                                    <select class="form-control" id="exampleSelect" name="topic" required="">
                                        <option value="" selected="">Add a category here</option>
                                        @foreach($category as $cat)
                                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Item Image Here <span>*</span></label>
                                    <input type="file" name="image" required="" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info"
                                               placeholder="Upload Image">
                                        <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                            </span>
                                    </div>
                                </div>

                                <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" value="1" name="add_in_slider" class="form-check-input"> Add to slider </label>
{{--                                    @if(old('is_current', $identity->is_current)) checked @endif>--}}
                                </div>

                                <br>
                                <hr>
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
