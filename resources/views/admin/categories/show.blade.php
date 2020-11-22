@extends('layouts.admin')

@section('content')
<div class="card mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Category Details</h6>
    </div>
    <div class="card-body">
        <div>
            Category Name: <strong>{{ $category->name }}</strong>
        </div>
        <div>
            Category Image: <img src="{{$category->cover_image['thumb']}}" alt="" height="150px" width="150px" style="border-radius: 30px">
        </div>
    </div>
</div>
@endsection