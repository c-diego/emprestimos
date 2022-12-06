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

  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <table class="table table-striped">
          <thead>
          <tr class="text-center">
            <th scope="col">Requerente</th>
            <th scope="col">Objeto</th>
            <th scope="col">Retirada</th>
            <th scope="col">Devolução</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Situação</th>
          </tr>
          </thead>
          <tbody class="align-middle">
          @if(isset($solicitations))
            @foreach($solicitations as $solicitation)
              <tr>
                <td class="text-center">{{$solicitation->user->name}}</td>
                <td class="text-center">{{$solicitation->item->title}}</td>
                <td class="text-center">{{$solicitation->start_date}}</td>
                <td class="text-center">{{$solicitation->end_date}}</td>
                <td class="text-center">{{$solicitation->amount}}</td>
                <td class="text-center">
                  <a href="{{route('manager.approveSolicitation', ['loan' => $solicitation])}}" class="btn btn-success rounded-0 fw-semibold ps-md-5 pe-md-5 pt-1 pb-1">Aprovar</a>
                  <a href="{{route('manager.denySolicitation', ['loan' => $solicitation])}}" class="btn btn-danger rounded-0 fw-semibold ps-md-5 pe-md-5 pt-1 pb-1">Negar</a>
                </td>
              </tr>
            @endforeach
          @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
