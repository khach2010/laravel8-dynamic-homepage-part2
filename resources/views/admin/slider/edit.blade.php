@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Slider Edit Page</h2>
        </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        <div class="card-body">
            <form action="{{ url('slider/update/'.$sliders->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                <input type="hidden" name="old_image" value="{{ $sliders->image }}">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="title" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter Slider Title" value="{{ $sliders->title }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$sliders->description}}</textarea>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlFile1">Slider Image Photo</label>
                    <input type="file" name="slider_image"  class="form-control-file" id="exampleFormControlFile1" value="{{ $sliders->image }}">
                </div>
                <div class="form-group">
                    <img src="{{ asset($sliders->image) }}" style="width:300px; height:160px;" >
                </div>
                <div class="form-footer pt-4 mt-2 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update Slider</button>

                </div>
            </form>
        </div>
    </div>


</div>
@endsection
