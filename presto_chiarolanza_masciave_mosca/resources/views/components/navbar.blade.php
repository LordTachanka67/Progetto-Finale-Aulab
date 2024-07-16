<nav class="navbar navbar-expand-lg fixed-top " id="nav">
    <div class="container-fluid nav-text nav2">
        <a class="py-2 navbar-brand" href="{{ route('homepage') }}"><svg xmlns="http://www.w3.org/2000/svg" width="25"
                height="25" fill="currentColor" class="bi bi-box2-heart me-2 mb-2" viewBox="0 0 16 16">
                <path d="M8 7.982C9.664 6.309 13.825 9.236 8 13 2.175 9.236 6.336 6.31 8 7.982" />
                <path
                    d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4zm0 1H7.5v3h-6zM8.5 4V1h3.75l2.25 3zM15 5v10H1V5z" />
            </svg> <span class="d-none d-sm-inline-block"> Presto.it</span>
           </a>
        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse my-1 " id="navbarSupportedContent"> --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              
              <x-searchbar/>
            
                @guest
                    <li class="nav-item">
                        <a class="nav-link buttonLogin d-none d-sm-block" href="{{ route('login') }}">Login</a>
                        <a class="nav-link buttonLogin d-block d-sm-none" href="{{ route('login') }}"><i class="bi bi-person fs-2"></i></a>
                    </li>
                @endguest
                @auth
                    <li class="nav-link buttonUser">
                        <button class="btn btn-quar" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasUser" aria-controls="offcanvasUser=">Ciao {{ auth()->user()->name }}
                            <i class="bi bi-person-circle"></i></button>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

{{--  <div class="navbar navbar-expand-lg nav-sec fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse row" id="navbarSupportedContent2">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 scrollmenu">
          <li class="nav-item">
            <a class="nav-link nav-sec-btn" aria-current="page" href="{{route('articles.index')}}">Tutti gli articoli</a>          
          </li>
          @foreach ($categories as $category)
          <li class="nav-item ">
            <a class="nav-link nav-sec-btn text-truncate" aria-current="page" href="{{route('categories.byCategory', compact('category'))}}">{{$category->name}}</a>
          </li>
          @endforeach

        </ul> 
      </div>
    </div>
  </div> --}}

{{-- <div class="scrollmenu fixed-top  d-flex justify-content-evenly">
  <a class="nav-link nav-sec-btn" aria-current="page" href="{{route('articles.index')}}">Tutti gli articoli</a>
    @foreach ($categories as $category)
        <a class="nav-link nav-sec-btn" aria-current="page"
            href="{{ route('categories.byCategory', compact('category')) }}">{{ $category->name }}</a>
    @endforeach
</div> --}}

<div class="d-none d-sm-block scrollmenu fixed-top d-flex justify-content-evenly">
  <a class="nav-link nav-sec-btn {{ Route::currentRouteName() === 'articles.index' ? 'active' : '' }}" aria-current="page" href="{{ route('articles.index') }}">Tutti gli articoli</a>
  @foreach ($categories as $category)
    <a class="nav-link nav-sec-btn {{ request()->is('categories/' . $category->id) ? 'active' : '' }}" aria-current="page" href="{{ route('categories.byCategory', ['category' => $category->id]) }}">
      {{ $category->name }}
    </a>
  @endforeach
</div>



