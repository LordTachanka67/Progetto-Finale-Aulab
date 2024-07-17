{{-- <div class="card mb-5" >
    <img src="{{$article->images->isNotEmpty() ? Storage::url($article->images->first()->path) : '/storage/images/default.png'}}" class=" card-img-top" alt="{{$article->title}}">
    <div class="card-body text-center">

      <h5 class="card-title text-truncate">{{$article->title}}</h5>
      <p class="card-text text-truncate">{{$article->description}}</p>
      <p class="card-title">Prezzo: €{{$article->price}} </p>
      <div>
        <span class="badge">categoria: {{$article->category->name}}</span>
      </div>
      <a href="{{route('articles.show', compact('article'))}}" class="btn btn-quar">Vai all'articolo</a>
    </div>
  </div> --}}