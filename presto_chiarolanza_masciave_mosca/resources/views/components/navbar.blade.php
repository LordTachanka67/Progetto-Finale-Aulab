<nav class="navbar navbar-expand-lg">
    <div class="container-fluid nav-text">
      <a class="navbar-brand" href="{{route('homepage')}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box2-heart me-2 mb-2" viewBox="0 0 16 16">
        <path d="M8 7.982C9.664 6.309 13.825 9.236 8 13 2.175 9.236 6.336 6.31 8 7.982"/>
        <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4zm0 1H7.5v3h-6zM8.5 4V1h3.75l2.25 3zM15 5v10H1V5z"/> 
      </svg>Presto.it</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('articles.index')}}">Tutti gli articoli</a>
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>              
          @endguest
          @auth  
          <li class="nav-link">Ciao {{auth()->user()->name}}</li>
          <form action="{{route('logout')}}" method="POST">
            @csrf <button class="nav-link">Logout</button>
          </form>

          <li class="nav-item">
            <a class="nav-link" href="{{route('articles.create')}}">INSERISCI ANNUNCIO</a>
          </li>    
          @endauth

          {{-- DROPDOWN --}}
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> --}}


          
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-quar" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>