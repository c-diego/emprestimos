@extends('templates.html')
@section('title', 'Items')

@section('content')


  <div class="container mt-5 mb-5">

    <h2 class="fs-6 mb-2">Pesquisa</h2>
    <div class="row mb-5">
      <div class="col-sm-6">
        <input type="text" class="form-control rounded-0">
      </div>
      <div class="col mt-2 mt-sm-0">
        <button type="button" class="btn btn-primary rounded-0 fw-semibold">Pesquisar</button>
      </div>
      <div class="col mt-2 mt-sm-0 align-self-end text-sm-center">
        <a href="{{route('manager.create')}}" type="button" class="btn btn-primary rounded-0 fw-semibold">Novo</a>
      </div>
    </div>

    @foreach($items as $item)
      @if(!$loop->first)
        <hr class="mb-4">
      @endif
      <div class="row text-center align-items-center mb-3">
        <div class="col-12 col-lg-1">
          <img src="{{asset('storage/'.$item->image)}}" alt="Imagem do Item" class="img-fluid">
        </div>
        <div class="col-12 col-lg-7">
          <h2 class="fs-6 fw-bold mt-2 mt-lg-0">{{$item->title}}</h2>
          <p class="ellipse">{{$item->description}}</p>
        </div>
        <div class="col-12 col-lg-2 mt-2 mt-lg-0">
          <a href="{{route('manager.edit', ['item' => $item])}}" type="button" class="btn btn-primary rounded-0 fw-semibold ps-5 pe-5 pt-1 pb-1">Editar</a>
        </div>
        <div class="col-12 col-lg-2 mt-2 mt-lg-0">
          <a href="{{route('manager.delete', ['item' => $item])}}" type="button" class="btn btn-danger rounded-0 fw-semibold ps-5 pe-5 pt-1 pb-1 mt-md-0 mt-sm-2 ">Excluir</a>
        </div>
      </div>
    @endforeach

  </div>
@endsection
