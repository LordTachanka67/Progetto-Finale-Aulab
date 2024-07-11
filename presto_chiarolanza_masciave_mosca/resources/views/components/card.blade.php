<div class="card mb-5" >
    <img src="https://picsum.photos/300/300" class=" card-img-top" alt="...">
    <div class="card-body">

      <h5 class="card-title text-truncate">{{$article->title}}</h5>
      <p class="card-text text-truncate">{{$article->description}}</p>
      <p>Prezzo: {{$article->price}}</p>
      <p>categoria: {{$article->category->name}}</p>
      <a href="{{route('articles.show', compact('article'))}}" class="btn btn-quar">Vai all'articolo</a>
    </div>
  </div>