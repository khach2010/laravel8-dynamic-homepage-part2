@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
      <div class="container">
        <h4>Home About</h4>
        <a href="{{ route('add.about') }}"> <button class='btn btn-info mb-2'>Add About</button> </a>
        <br>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!-- All Categories -->
          <div class="row">

            <!-- col 8 -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All About</div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col" width="5%">No</th>
                            <th scope="col" width="15%">Title</th>
                            <th scope="col" width="15%">Short Description</th>
                            <th scope="col" width="30%">Long Description</th>
                            <th scope="col" width="10%">Created At</th>
                            <th scope="col" width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 0)
                            @foreach($homeabout as $about)
                            <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $about->title}}</td>
                            <td>{{ $about->short_des}}</td>
                            <td>{{ $about->long_des}}</td>

                                @if($about->created_at == NULL)
                                <span class='text-danger'>No date set</span>
                                @else
            {{Carbon\Carbon::parse($about->created_at)->diffForHumans()}}
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('about/edit/'.$about->id)}}" class='btn btn-info' >Edit</a>
                                <a href="{{ url('about/delete/'.$about->id)}}" onclick="return confirm('Are you sure to delete')"class='btn btn-danger' >Delete</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


          </div>
          <!-- end col-4 -->
      </div>
    </div>

@endsection
