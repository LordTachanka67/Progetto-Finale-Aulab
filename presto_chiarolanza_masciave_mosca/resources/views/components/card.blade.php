<div class="card mb-5 " >
    <img src="https://picsum.photos/300/300" class=" card-img-top" alt="...">
    <div class="card-body">

      <h5 class="card-title">{{$article->title}}</h5>
      <p class="card-text">{{$article->description}}</p>
      <p>Prezzo: {{$article->price}}</p>
      <p>categoria: {{$article->category->name}}</p>
      <a href="#" class="btn btn-quar">Go somewhere</a>
    </div>
  </div>