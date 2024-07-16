<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUser" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body position-relative">
        @auth
            <h3 class="offcanvas-title ms-3 my-3" id="offcanvasRightLabel"><span id="greeting"></span><br>
                {{ auth()->user()->name }}, </h5>
                <ul class="list-unstyled">
                    <li class="nav-item">
                        <a class="nav-link buttonOffcanvas ms-3 fs-5" href="{{ route('articles.create') }}"><i
                                class="bi bi-plus-square"></i> Inserisci annuncio </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link buttonOffcanvas ms-3 fs-5" href="{{ route('dashboard.index') }}"><i class="bi bi-clipboard-data">
                        </i> Dashboard </a>
                    </li>

                    @if (auth()->user()->is_revisor)
                    <div>
                      <hr class="mt-5">
                      <li class="nav-item">
                          <a class="nav-link buttonOffcanvas ms-3 fs-5" href=" {{ route('revisor.index') }} "><i
                                  class="bi bi-suitcase-lg"></i> Articoli da revisionare<span class="ms-2 top-0 start-100 translate-middle rounded-pill bg-ter px-3 py-1 text-center">{{$revisor_pending_number}}</span></a>
                                    
                      </li>
                    </div>
                    @else
                        <li class="nav-item">
                            <a class="nav-link buttonOffcanvas ms-3 mt-5 fs-5" href=" {{ route('revisorForm') }} "><i
                                    class="bi bi-suitcase-lg"></i> Lavora con noi </a>
                        </li>
                    @endif

                </ul>
                <form action="{{ route('logout') }}" method="POST">
                    <button class="nav-link buttonOffcanvas m-3 fs-5 position-absolute bottom-0 end-0"><i
                            class="bi bi-box-arrow-right"></i> Logout</button>
                    @csrf
                </form>
            @endauth
    </div>
</div>
