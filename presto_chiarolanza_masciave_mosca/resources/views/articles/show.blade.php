<x-layout>

    <x-masthead h1='{{$article->title}}' />

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
             <x-carousel/>
        </div>
        <div class="col-12 col-md-4">
             <h2>{{$article->title}}</h2>
             <h6>Venduto da: {{$article->user->name}}</h6>
             <h3>{{$article->price}} €</h3>
             <button class="btn btn-quar">Acquista <i class="bi bi-cart3"></i></button>
        </div>
        <div class="col-10">
            <span class="badge">{{$article->category->name}}</span>
            <p>Descrizione: {{$article->description}}</p>
        </div>
    </div>
</div>
   
</x-layout>