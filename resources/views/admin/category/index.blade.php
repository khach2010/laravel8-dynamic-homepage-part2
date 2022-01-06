<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        All Category
        <b style="float:right">
        <span class="badge rounded-pill bg-danger">Danger</span>
        </b>
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
            <!-- All Categories -->
          <div class="row">
            <!-- col 8 -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Category</div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">User</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                            <th scope="row"> {{ $categories->firstItem()+$loop->index  }} </th>
                            <td>{{ $category->category_name}}</td>
                            <td>{{ $category->user->name}}</td>
                            <td>
                                @if($category->created_at == NULL)
                                <span class='text-danger'>No date set</span>
                                @else
            {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('category/edit/'.$category->id)}}" class='btn btn-info' >Edit</a>
                                <a href="{{ url('category/trash/'.$category->id)}}" class='btn btn-danger' >Delete</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>

            <!-- col-4 -->
            <div class="col-md-4">
                <div class="card">

                    <div class="card-header">Add Category</div>
                    <div class="card-body">
                    <form action="{{ route('store.category')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Category Name</label>
                            <input type="text" name="category_name" class="form-control mb-4" id="exampleInputEmail1" aria-describedby="emailHelp">

                            @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                    </div>
                </div>
            </div>
          </div>

           <!-- Trash Categories -->
           <div class="row">
            <!-- col 8 -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Trash Category</div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">User</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trashCat as $category)
                            <tr>
                            <th scope="row"> {{ $trashCat->firstItem()+$loop->index  }} </th>
                            <td>{{ $category->category_name}}</td>
                            <td>{{ $category->user->name}}</td>
                            <td>
                                @if($category->created_at == NULL)
                                <span class='text-danger'>No date set</span>
                                @else
            {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('category/restore/'.$category->id)}}" class='btn btn-info' >Restore</a>
                                <a href="{{ url('category/pdelete/'.$category->id)}}" class='btn btn-danger' >P Delete</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $trashCat->links() }}
                </div>
            </div>
          </div>
      </div>
    </div>
</x-app-layout>
