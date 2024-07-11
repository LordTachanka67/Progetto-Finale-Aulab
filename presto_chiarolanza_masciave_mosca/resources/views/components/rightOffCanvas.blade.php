
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUser" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body position-relative">
    @auth
    <h3 class="offcanvas-title ms-3 my-3" id="offcanvasRightLabel"><span id="greeting"></span> {{auth()->user()->name}}, </h5>
    <form action="{{route('logout')}}" method="POST">
            @csrf 
        </form>
        <ul class="list-unstyled">
        <li class="nav-item">
            <a class="nav-link ms-3" href="{{route('articles.create')}}"><i class="bi bi-plus-square"></i> Inserisci annuncio </a>
        </li>  
        </ul>  
        <button class="nav-link m-3 fs-5 position-absolute bottom-0 end-0"><i class="bi bi-box-arrow-right"></i> Logout</button>
        @endauth
  </div>
</div>