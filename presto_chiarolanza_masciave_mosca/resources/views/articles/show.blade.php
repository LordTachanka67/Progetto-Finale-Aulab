<x-layout>

    <x-masthead h1='{{$article->title}}' />

<div class="container-fluid">
    <div class="show-path mb-3">
        <span><a href="{{route('homepage')}}">home</a> /</span>
        <span><a href="{{route('categories.byCategory',['category' => $article->category])}}">{{$article->category->name}}</a> /</span>
        <span>{{$article->title}}</span>
     </div>
     {{--
    <p>
    /<a href="{{route('homepage')}}">home</a>/
    <a href="{{route('categories.byCategory',compact('category'))}}">{{$article->category->name}}</a>
    /
</p> --}}
    <div class="row px-5 justify-content-center">

        <div class="col-12 col-md-7">
             <x-carousel/>
        </div>
        <div class="col-12 col-md-4">
             <h2 class="display-2 fw-bold">{{$article->title}}</h2>
             <h6 class="ms-3">Venduto da: {{$article->user->name}}</h6>
             <span class="badge"><a href="{{route('categories.byCategory',['category' => $article->category])}}">{{$article->category->name}}</a></span>
             <h3>{{$article->price}} € <button class="btn btn-quar">Acquista <i class="bi bi-cart3"></i></button></h3>
             <button class="btn btn-quar">Acquista <i class="bi bi-cart3"></i></button>
        </div>
        <div class="col-10 mt-3">
            <p>Descrizione: {{$article->description}}</p>
        </div>
    </div>
</div>
   
</x-layout>