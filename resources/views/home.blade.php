@extends('templates.html')
@section('title', 'Início')

@section('content')

  <!-- Search -->
  <div class="container mt-5">
    <div class="container border border-gray ">
      <div class="row bg-black">
        <div class="col">
          <span class="fs-5 p-1 text-light">Pesquisa de Itens</span>
        </div>
      </div>
      <form method="POST" action="{{route('search')}}">
        @csrf
        <div class="row mt-3">
          <div class="col-md-7">
            <div class="input-group mb-3">
              <input type="text" name="term" class="form-control bg-gray border-gray rounded-0 pt-1 pb-1"
                     placeholder="Adaptadorzim">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-7 mb-md-0 mb-3">
            <select name="sector" class="form-select bg-gray border-gray rounded-0 pt-1 pb-1">
              <option selected value="cogeti">COGETI</option>
            </select>
          </div>
          <div class="col">
            <button type="submit" class="btn btn-primary rounded-0 fw-semibold ps-md-5 pe-md-5 pt-1 pb-1">Pesquisar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- End Search -->

  <!-- Pagination -->
  {{$items->onEachSide(1)->links()}}
  <!-- End Pagination -->

  <!-- Items -->
  <div class="container mb-5">
    @foreach($items as $item)

      <hr class="mb-4">
      <div class="row align-items-center mb-3">
        <div class="col-md-2 text-center">
          <img src="{{$item->image}}" alt="Imagem do Item" class="img-fluid">
        </div>
        <div class="col mt-3 mt-lg-0">
          <h2 class="fs-6 text-center text-md-start fw-bold">{{$item->title}}</h2>
          <div class="row mt-3 align-items-center">
            <div class="col">
              <p class="text-center description text-md-start">{{$item->description}}</p>
            </div>
          </div>
          <div class="row mt-2 justify-content-center">
            <div class="col text-center text-md-start">
              <a href="{{route('item', ['item' => $item])}}"
                 class="btn btn-primary rounded-0 fw-semibold ps-5 pe-5 pt-1 pb-1 {{$item->is_available ? '' : 'disabled'}}">
                Solicitar
              </a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <!-- End Items --->

@endsection

