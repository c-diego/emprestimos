<div class="container-fluid bg-black text-light pt-3 pb-3 shadow-sm">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="col-sm align-self-center">
        <a href="{{route('home')}}" class="fs-5 nav-icon fw-bold">Empréstimos</a>
      </div>
      <div class="col-sm align-self-center text-end">
        @if(Auth::user() && Auth::user()->is_manager)
          <a href="{{route('manager.items')}}" class="fs-6 pe-3 nav-icon">Items do setor</a>
        @endif
        <a href="{{route('profile')}}" class="fs-6 pe-3 nav-icon">{{Auth::user() ? Auth::user()->name : 'Login'}}</a>
        <a href="{{route('logout')}}" class="fs-6 nav-icon">Sair</a>
      </div>
    </div>
  </div>
</div>
