@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Home Slider</h2>
        </div>
        <div class="card-body">
        <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    @error('title')
                    <span class="text-danger">- {{$message}}</span>
                    @enderror
                    <input type="title" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter Slider Title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Slider Image Photo</label>

                    <!-- error handler message -->
                    @error('slider_image')
                    <span class="text-danger">- {{$message}}</span>
                    @enderror

                    <input type="file" name="slider_image"  class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-footer pt-4 mt-2 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Add Slider</button>

                </div>
            </form>
        </div>
    </div>


</div>
@endsection
