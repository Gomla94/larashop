@extends('layouts.admin')

@section('content')

{{-- {{$category->name}}
<img src="{{$category->cover_image['thumb']}}" alt="" width="100px" height="100px"> --}}
<div class="card mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Category Details</h6>
    </div>
    <div class="card-body">
        <div>
            Category Name: <strong>{{ $category->name }}</strong>
        </div>
    </div>
</div>
@endsection