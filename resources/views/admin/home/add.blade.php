@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Home About</h2>
        </div>
        <div class="card-body">
        <form action="{{ route('store.about') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    @error('title')
                    <span class="text-danger">- {{$message}}</span>
                    @enderror
                    <input type="title" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter About Title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short Description</label>
                    <textarea class="form-control" name="short_des" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Long Description</label>
                    <textarea class="form-control" name="long_des" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>



                <div class="form-footer pt-4 mt-2 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Add About</button>

                </div>
            </form>
        </div>
    </div>


</div>
@endsection
