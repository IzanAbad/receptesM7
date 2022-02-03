@extends('layouts.plantilla')
@section('title')
Home
@endsection

@section('content')

@foreach ($recipes as $recipe)

<div class="post-preview">
                        <a href="{{route('recipe.show',['id'=>$recipe->id])}}">
                            <h2 class="post-title">{{ $recipe->name }}</h2>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a>{{ $recipe->name }}</a>
                            on {{$recipe->created_at}}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
@endforeach
@endsection
