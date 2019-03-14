@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Category</div>

                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($category as $key => $category)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td>{{$category->name}}</td>
                          <td><a href="{{ url('category/'.$category->id.'/edit') }}">Edit</a></td>
                          <td><a href="#">Delete</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category</div>

                <div class="card-body">
                    <form class="form" id="my_form" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                        <div class="form-body">
                            <!--     -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category Name *</label>
                                        <input type="text" id="name" class="form-control" placeholder="Category Name" name="name" required>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
