@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Category</div>

                <div class="card-body">
                    <form class="form" id="my_form" action="{{ route('category.update',[$category->id]) }}" method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <input type="hidden" name="_method" value="put">
                        <div class="form-body">
                            <!--     -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category Name *</label>
                                        <input type="text" id="name" class="form-control" placeholder="Category Name" name="name" value="{{ $category->name }}" required>
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