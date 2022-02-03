@extends('layouts.plantilla')
@section('content')
<?php

$ingredients = explode(',',$recipe->ingredients);
$pasos = explode('.', $recipe->instructions);

?>

<h1>{{$recipe->name}}</h1>
<div>By: {{$recipe->name}}</div>
<img src="/{{$recipe->image}}">
<div>
<div><h3>Ingredients</h3></div>
@foreach ($ingredients as $ingredient)
    <p>{{$ingredient}}</p>

@endforeach

</div>
<div><div><h3>Instruccións</h3></div>
    @foreach ($pasos as $instruction)
        <p>{{$instruction}}</p>

    @endforeach
</div>

<div>

</div>
<!-- -->
     <section class="rounded-b-lg  mt-4 ">



            <form action="{{route('comment.store')}}" method="POST" accept-charset="UTF-8"><input type="hidden" >
                @csrf

                <input name="author_id" type="hidden" value="{{auth()->user()->id}}">
                <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
              <textarea name="text" class="w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl" placeholder="Ask questions here." cols="6" rows="6" id="comment" name="comment" spellcheck="false"></textarea>
              <button class="font-bold py-2 px-4 w-full bg-purple-400 text-lg text-white shadow-md rounded-lg ">Comment </button>
            </form>

                  <div id="task-comments" class="pt-4">
                    @foreach($recipe->comments as $comment)

            <div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
              <div class="flex flex-row justify-center mr-2">
               <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">


                <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">{{$comment->author->name}}</h3>
              </div>


                <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left ">{{$comment->text}}</p>

             @if(Auth::user()!= null&& Auth::user()->isAdmin())
               <form action="{{route('comment.delete')}}" method="POST">
                @method('delete')
                @csrf
                <input name="comment_id" type="hidden" value="{{$comment->id}}">
                <input name="recipe_id" type="hidden" value="{{$recipe->id}}">
                <button>Eliminar</button>
            </form>
            @endif
            </div>
                @endforeach
                  </div>
                </section>

@endsection

<!--



        <section class="rounded-b-lg  mt-4 ">


            <form action="/" accept-charset="UTF-8" method="post"><input type="hidden" >
              <textarea class="w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl" placeholder="Ask questions here." cols="6" rows="6" id="comment_content" spellcheck="false"></textarea>
              <button class="font-bold py-2 px-4 w-full bg-purple-400 text-lg text-white shadow-md rounded-lg ">Comment </button>
            </form>

                  <div id="task-comments" class="pt-4">

            <div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
              <div class="flex flex-row justify-center mr-2">
                <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
                <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left "></h3>
              </div>


                <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left ">Hi good morning will it be the entire house. </p>

            </div>
            <div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
              <div class="flex flex-row justify-center mr-2">
                <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
                <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left "> Motti</h3>
              </div>


                <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left "><span class="text-purple-600 font-semibold"></span> Hello. Yes, the entire exterior, including the walls. </p>

            </div>

                  </div>
                </section>
comment-->
