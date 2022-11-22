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
    <div class="row">
      <div class="col">
        <form method="POST" action="{{route('login')}}">
          @csrf
          <lable for="login">E-mail</lable>
          <input type="email" name="email" id="email"/>
          <br>
          <lable for="password">E-mail</lable>
          <input type="password" name="password" id="password"/>
          <button type="submit">Login</button>
        </form>
      </div>
    </div>
  </div>
@endsection
