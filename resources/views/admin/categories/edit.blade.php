@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        Add New Category
    </div>
    <div class="card-body">
        <form class="user" action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}" id="name">
                @error('name')
                    <span style="color:red">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <label for="image">Category Image</label>
            <div class="input-group mb-5">
                <div class="custom-file col-sm-6 mb-3 mb-sm-0">
                  <input type="file" class="custom-file-input" name="image" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    @error('image')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button class="btn btn-primary btn-user mt-5 btn-block">Update Category</button>
        </form>
    </div>
</div>

  @endsection