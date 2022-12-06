@extends('templates.html')
@section('title', 'Login')

@section('content')

  @if ($errors->any())
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  @endif

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-4">
        <form method="POST" action="{{route('login')}}">
          @csrf
          <div class="row mt-2">
            <div class="col">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control rounded-0" id="email" name="email">
            </div>
          </div>

          <div class="row mt-2">
            <div class="col">
              <label for="password" class="form-label">Senha</label>
              <input type="password" min="8" class="form-control rounded-0" id="password" name="password">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col">
              <button type="submit" class="btn btn-primary rounded-0">Entrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
