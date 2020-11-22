@extends('layouts.admin')

@section('content')
{{$product->name}}
<img src="{{$product->cover_image['thumb']}}" alt="" width="100px" height="100px">
@endsection