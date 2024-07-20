<footer class="pt-3 mt-4 mx-0 container-fluid">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link linkFooter px-2 text-body-secondary">{{__('ui.home')}}</a></li>
      <li class="nav-item"><a href="{{route('revisorForm')}}" class="nav-link linkFooter px-2 text-body-secondary">{{__('ui.lavoraConNoi')}}</a></li>
      {{-- <li class="nav-item"><a href="#" class="nav-link linkFooter px-2 text-body-secondary">Pricing</a></li> --}}
      {{-- <li class="nav-item"><a href="#" class="nav-link linkFooter px-2 text-body-secondary">FAQs</a></li> --}}
      <li class="nav-item"><a href="{{Route('team')}}" class="nav-link linkFooter px-2 text-body-secondary">{{__('ui.about')}}</a></li>
    </ul>
<div class="row justify-content-between">
  {{-- LOCALE BUTTONS --}}
  <div class="text-star ms-5 col-5">
  <x-_locale lang="it"/>
  <x-_locale lang="en"/>
  <x-_locale lang="es"/>
  </div>
  {{-- SOCIAL BUTTON --}}
  <div class="text-center col-5">
    <div class="btn__container">
      <a href="{{Route('instagram')}}" target="_blank" class="btn-i">
        <i class="social-btn bi bi-instagram"></i>
        <span>instagram</span>
      </a>
        <a href="https://www.facebook.com/profile.php?id=100090632376757" target="_blank" class="btn-f">
          <i class="social-btn bi bi-facebook"></i>
        <span>facebook</span>
      </a>
    </div>
  </div>

</div>
    <p class="text-center text-body-secondary">© 2024 Presto.it</p>
  </footer>