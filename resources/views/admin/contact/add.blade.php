@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Add Contact</h2>
        </div>
        <div class="card-body">
        <form action="{{ route('store.contact') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label>
                    <input type="text" class="form-control" name="address" id="exampleFormControlInput1" placeholder=" Address">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input type="text" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="Phone Number">
                </div>


                <div class="form-footer pt-4 mt-2 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Add Contact</button>

                </div>
            </form>
        </div>
    </div>


</div>
@endsection
