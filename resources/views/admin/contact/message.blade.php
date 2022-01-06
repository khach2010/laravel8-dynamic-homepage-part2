@extends('admin.admin_master')

@section('admin')



<div class="py-12">
      <div class="container">
        <h4>Form Contact Messages</h4>
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
                            <th scope="col" width="10%">Name</th>
                            <th scope="col" width="15%">Email</th>
                            <th scope="col" width="10%">Subject</th>
                            <th scope="col" width="40%">Message</th>
                            <th scope="col" width="10%">Created At</th>
                            <th scope="col" width="10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 0)
                            @foreach($contactsMessages as $message)
                            <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $message->name}}</td>
                            <td>{{ $message->email}}</td>
                            <td>{{ $message->subject}}</td>
                            <td>{{ $message->message}}</td>
                            <td>
                                @if($message->created_at == NULL)
                                <span class='text-danger'>No date set</span>
                                @else
            {{Carbon\Carbon::parse($message->created_at)->diffForHumans()}}
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('contact-form-message/delete/'.$message->id)}}" onclick="return confirm('Are you sure to delete')"class='btn btn-danger' >Delete</a>
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
