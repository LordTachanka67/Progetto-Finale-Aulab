{{-- <div class="card mb-5" >
    <img src="https://picsum.photos/300/300" class=" card-img-top" alt="...">
    <div class="card-details text-center">

      <h5 class="text-title text-truncate">{{$article->title}}</h5>
      <p class="card-text text-truncate">{{$article->description}}</p>
      <p class="card-title">Prezzo: €{{$article->price}} </p>
      <div>
        <span class="badge">categoria: {{$article->category->name}}</span>
      </div>
      <a href="{{route('articles.show', compact('article'))}}" class="btn btn-quar">Vai all'articolo</a>
    </div>
  </div> --}}

  <div class="card mb-5">
    @if (request()->is('categories/' . $article->category_id))
        
    @else
    <div>
        <span class="badge position-absolute">{{$article->category->name}}</span>
    </div>    
    @endif
    {{-- @dd($article->images); --}}
    <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(400, 400) : '/background/default.jpg'}}" class=" card-img-top" alt="{{$article->title}}">
    <div class="card-details text-center">
      <p class="text-title text-truncate text-quar text-truncate">{{$article->title}}</p>
      <p class="text-body text-truncate">{{$article->description}}</p>
      <p class="text-title text-quar">{{__('ui.prezzo')}}: €{{ number_format($article->price, 2, ',') }}</p>
      
    </div>
    <a href="{{route('revisor.show', compact('article'))}}" class="card-button btn-quar text-decoration-none text-center">{{__('ui.vaiArticolo')}}</a>
  </div>