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

            <label for="image">Category Image</label>
            <div class="input-group">
                <div class="custom-file col-sm-6 mb-3 mb-sm-0">
                  <input type="file" class="custom-file-input" name="image" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            @error('image')
                <span style="color:red">{{ $message }}</span>
            @enderror
            
            <button class="btn btn-primary btn-user mt-5 btn-block">Create Category</button>
        </form>
    </div>
</div>

  @endsection