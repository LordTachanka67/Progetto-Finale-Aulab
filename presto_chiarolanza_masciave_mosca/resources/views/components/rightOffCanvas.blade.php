<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUser" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" id="close"></button>
    </div>
    <div class="offcanvas-body position-relative mt-5">
        @auth
            <h3 class="offcanvas-title ms-3 my-3" id="offcanvasRightLabel"><span id="greeting"></span><br>
                {{ auth()->user()->name }}, </h5>
                <ul class="list-unstyled">
                    <li class="nav-item">
                        <a class="nav-link buttonOffcanvas ms-3 fs-5" href="{{ route('articles.create') }}"><i
                                class="bi bi-plus-square"></i> {{__('ui.inserisciAnnuncio')}} </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link buttonOffcanvas ms-3 fs-5" href="{{ route('dashboard.index') }}"><i class="bi bi-clipboard-data">
                        </i> {{__('ui.dashboard')}} </a>
                    </li>
                    {{-- Preferiti --}}
                    <li class="nav-item">
                        <a class="nav-link buttonOffcanvas ms-3 fs-5 " href="{{ route('dashboard.preferiti') }}"><i class="bi bi-hearts"></i> {{__('ui.preferiti')}} </a>
                    </li>
                    {{-- Carrello --}}
                    <li class="nav-item">
                        <a class="nav-link buttonOffcanvas ms-3 fs-5 d-none" href="{{ route('dashboard.cart') }}"><i class="bi bi-cart3"></i>
                        </i> {{__('ui.carrello')}} </a>
                    </li>
                    {{-- recensioni --}}
                    <li class="nav-item">
                        <a class="nav-link buttonOffcanvas ms-3 fs-5 d-none" href="{{ route('dashboard.feedbacks') }}"><i class="bi bi-star-half"></i>
                        </i> {{__('ui.recensioni')}} </a>
                    </li>

                    @if (auth()->user()->is_revisor)
                    <div>
                      <hr class="mt-5">
                      <li class="nav-item">
                          <a class="nav-link buttonOffcanvas ms-3 fs-5" href=" {{ route('revisor.index') }} "><i
                                  class="bi bi-suitcase-lg"></i> {{__('ui.articoliDaRevisionare')}}<span class="ms-2 top-0 start-100 translate-middle rounded-pill bg-ter px-3 py-1 text-center">{{$revisor_pending_number}}</span></a>
                                    
                      </li>
                    </div>
                    @else
                        <li class="nav-item">
                            <a class="nav-link buttonOffcanvas ms-3 mt-5 fs-5" href=" {{ route('revisorForm') }} "><i
                                    class="bi bi-suitcase-lg"></i> {{__('ui.lavoraConNoi')}} </a>
                        </li>
                    @endif

                </ul>

                {{-- <span class="position-absolute bottom-0 start-1 mb-2" id="UsedLanguage">{{__('ui.language')}} <x-_locale lang="{{__('ui.language')}}"/></span> --}}
                <span class="position-absolute start-1 ps-5 mb-3 text-quar" id="UsedLanguage"><img class="me-2" src="{{asset('vendor/blade-flags/language-' . __('ui.language') . '.svg')}}" width="32" height="32" alt="flag">{{__('ui.language')}}</span>
                

                <form action="{{ route('logout') }}" method="POST">
                    <button class="nav-link buttonOffcanvas m-3 fs-5 position-absolute  " id="logout"><i
                            class="bi bi-box-arrow-right"></i> {{__('ui.logout')}}</button>
                    @csrf
                </form>
            @endauth
    </div>
</div>
