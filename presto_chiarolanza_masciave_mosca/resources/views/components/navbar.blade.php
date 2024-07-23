<nav class="navbar navbar-expand-lg fixed-top " id="nav">
    <div class="container-fluid nav-text nav2">
        <a class="py-2 navbar-brand" href="{{ route('homepage') }}">
            <img id="logo" src="/background/logo.png" alt="Presto.it"></a>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <x-searchbar />

            @guest
                <li class="nav-item">
                    <a class="nav-link buttonLogin d-none d-sm-block" href="{{ route('login') }}">{{ __('ui.login') }}</a>
                    <a class="nav-link buttonLogin d-block d-sm-none" href="{{ route('login') }}"><i
                            class="bi bi-person fs-2"></i></a>
                </li>
            @endguest
            @auth
                <li class="nav-link buttonUser">
                    <button class="btn btn-quar" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUser"
                        aria-controls="offcanvasUser="><span class="d-none d-sm-inline">{{ __('ui.ciao') }}
                            {{ auth()->user()->name }}</span>
                        <i class="bi bi-person-circle"></i></button>
                </li>
            @endauth

        </ul>
    </div>
    </div>
</nav>

<div class="d-none d-sm-block scrollmenu fixed-top d-flex text-center justify-content-evenly">
    <a class="nav-link nav-sec-btn col {{ Route::currentRouteName() === 'articles.index' ? 'active' : '' }}"
        aria-current="page" href="{{ route('articles.index') }}">{{ __('ui.tuttiGliArticoli') }}</a>
    @foreach ($categories as $category)
        <a class="nav-link nav-sec-btn col {{ request()->is('categories/' . $category->id) ? 'active' : '' }}"
            aria-current="page" href="{{ route('categories.byCategory', ['category' => $category->id]) }}">
            {{ __('ui.' . $category->name) }}
        </a>
    @endforeach
</div>
