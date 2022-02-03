@extends('layouts.plantilla')
@section('title')
Categories
@endsection
@section('content')

@foreach ($categories as $category)
<div class="post-preview">
    <a href="{{route('categories.show',['id' => $category->id])}}"><h2 class="post-title" > {{ $category->name }}</h2></a>

</div>
<hr class="my-4" />
    @endforeach

@endsection
