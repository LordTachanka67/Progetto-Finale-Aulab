<div class="card mb-5">
       
    {{-- <div>
        <span class="badge position-absolute">categoria: {{$article->category->name}}</span>
    </div>    --}} 
   
    <img src="https://picsum.photos/300/300" class="card-img-top mb-3 position-relative" alt="{{$article->title}}">
    <div class="card-details text-center">
      <p class="text-title text-truncate text-quar">{{$article->title}}</p>
      <p class="text-body text-truncate">{{$article->description}}</p>
      <p class="text-title text-quar">Prezzo: €{{ number_format($article->price, 2, ',') }}</p>
      <a href="{{route('dashboard.edit', compact('article'))}}" class="btn btn-success">MODIFICA</a>
      <form action="{{route('dashboard.destroy', compact('article'))}}" method="post">
      @csrf
      @method('delete')
      <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
      </form>
      
    </div>
    <a href="{{route('dashboard.show', compact('article'))}}" class="card-button btn-quar text-decoration-none text-center">Vai all'articolo</a>
  </div>