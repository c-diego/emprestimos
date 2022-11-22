@extends('templates.html')
@section('title', 'Início')

@section('content')

  <div class="container mt-5">
    <h1 class="fs-6">Seus Empréstimos</h1>
    <hr>
    <form>
      <div class="row mt-3 align-items-center">
        <div class="col-md-4">
          <input type="text" class="form-control bg-cinza rounded-0 pt-1 pb-1" placeholder="Adaptadorzim">
        </div>
        <div class="col">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">Solicitado</label>
        </div>
        <div class="col">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
          <label class="form-check-label" for="flexRadioDefault2">Respondido</label>
        </div>
        <div class="col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
          <label class="form-check-label" for="flexCheckIndeterminate">Devolvido</label>
        </div>
        <div class="col">
          <select class="form-select bg-cinza rounded-0 pt-1 pb-1">
            <option selected>7 dias</option>
            <option>30 dias</option>
            <option>60 dias</option>
            <option>Todos</option>
          </select>
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
        <th scope="col">Nome</th>
        <th scope="col">Retirada</th>
        <th scope="col">Devolução</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Situação</th>
      </tr>
      </thead>
      <tbody class="">
      @foreach($loans as $loan)
        <tr>
          <td>{{$loan->item->title}}</td>
          <td>{{$loan->start_date}}</td>
          <td>{{$loan->end_date}}</td>
          <td>{{$loan->amount}}</td>
          <td>Aprovado</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection
