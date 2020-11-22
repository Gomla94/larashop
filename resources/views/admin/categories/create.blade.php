@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        Add New Category
    </div>
    <div class="card-body">
        <form class="user" action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Category Name">
                @error('name')
                    <span style="color:red">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <span style="color:red">{{ $message }}</span>
                @enderror
                </div>
            </div>
            
            <button class="btn btn-primary btn-user btn-block">Create Category</button>
        </form>
    </div>
</div>

  @endsection