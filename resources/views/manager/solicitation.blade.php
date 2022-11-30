@extends('templates.html')
@section('title', 'Solicitações')

@section('content')

  <div class="container mt-5">
    <h1 class="fs-6">Solicitações pendentes</h1>
    <hr>
    <form>
      <div class="row mt-3 align-items-center">
        <div class="col-md-4">
          <input type="text" class="form-control bg-gray rounded-0 pt-1 pb-1" placeholder="Nome do objeto">
        </div>
        <div class="col">
          <button type="button" class="btn btn-primary rounded-0 fw-semibold ps-md-5 pe-md-5 pt-1 pb-1">Pesquisar
          </button>
        </div>
      </div>
    </form>
  </div>

  <div class="container mt-5 text-center">
    <table class="table table-striped">
      <thead>
      <tr>
        <th scope="col">Requerente</th>
        <th scope="col">Objeto</th>
        <th scope="col">Retirada</th>
        <th scope="col">Devolução</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Situação</th>
      </tr>
      </thead>
      <tbody class="">
      @if(isset($solicitations))
        @foreach($solicitations as $solicitation)
          <tr>
            <td>{{$solicitation->item->author}}</td>
            <td>{{$solicitation->item->title}}</td>
            <td>{{$solicitation->start_date}}</td>
            <td>{{$solicitation->end_date}}</td>
            <td>{{$solicitation->amount}}</td>
            <td>Aprovar | Negar</td>
          </tr>
        @endforeach
      @endif
      </tbody>
    </table>
  </div>
@endsection
