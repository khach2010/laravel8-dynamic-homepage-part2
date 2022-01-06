@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
      <div class="container">
        <h4>Contact Page</h4>
        <a href="{{ route('add.contact') }}"> <button class='btn btn-info mb-2'>Add Contact</button> </a>
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
                    <div class="card-header">All Contact</div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col" width="5%">No</th>
                            <th scope="col" width="15%">Address</th>
                            <th scope="col" width="15%">Email</th>
                            <th scope="col" width="30%">Phone</th>
                            <th scope="col" width="10%">Created At</th>
                            <th scope="col" width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 0)
                            @foreach($contacts as $contact)
                            <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $contact->address}}</td>
                            <td>{{ $contact->email}}</td>
                            <td>{{ $contact->phone}}</td>

                                @if($contact->created_at == NULL)
                                <span class='text-danger'>No date set</span>
                                @else
            {{Carbon\Carbon::parse($contact->created_at)->diffForHumans()}}
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('contact/edit/'.$contact->id)}}" class='btn btn-info' >Edit</a>
                                <a href="{{ url('contact/delete/'.$contact->id)}}" onclick="return confirm('Are you sure to delete')"class='btn btn-danger' >Delete</a>
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
