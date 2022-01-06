@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Update Home About</h2>
        </div>
        <div class="card-body">
        <form action="{{ url('about/update/'.$homeabout->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Update Title</label>
                    @error('title')
                    <span class="text-danger">- {{$message}}</span>
                    @enderror
                    <input type="title" class="form-control" name="title" id="exampleFormControlInput1" value="{{ $homeabout->title }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short Description</label>
                    <textarea class="form-control" name="short_des" id="exampleFormControlTextarea1" rows="3">{{$homeabout->short_des}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Long Description</label>
                    <textarea class="form-control" name="long_des" id="exampleFormControlTextarea1" rows="3">{{$homeabout->long_des}}</textarea>
                </div>



                <div class="form-footer pt-4 mt-2 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update About</button>

                </div>
            </form>
        </div>
    </div>


</div>
@endsection
