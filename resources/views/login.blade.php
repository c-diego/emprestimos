@extends('templates.html')
@section('title', 'Login')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <form method="get" action="{{route('auth')}}">
        @csrf
        <lable for="login">E-mail</lable>
        <input type="email" id="email"/>
        <br>
        <lable for="password">E-mail</lable>
        <input type="password" id="password"/>
        <button type="submit" value="ok"/>
      </form>
    </div>
  </div>
</div>
@endsection
