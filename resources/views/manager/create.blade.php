@extends('templates.html')
@section('title', 'Adicionar Item')

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

  <div class="container mt-5 mb-5">
    <form enctype="multipart/form-data" action="{{route('manager.save')}}" method="post">
      @csrf
      <div class="row justify-content-center">
        <div class="col col-lg-6">
          <div class="row mt-3">
            <div class="col-12 col-md-8">
              <label for="name" class="form-label">Nome</label>
              <input type="text" class="form-control rounded-0" id="title" name="title" value="{{old('title')}}">
            </div>
            <div class="col mt-3 mt-md-0">
              <label for="amount" class="form-label">Quantidade</label>
              <input type="number" class="form-control rounded-0" id="amount" name="amount" value="{{old('amount')}}">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-md-8">
              <label for="image" class="form-label">Imagem</label>
              <input type="file" class="form-control rounded-0" id="image" name="image">
            </div>
            <div class="col mt-3 mt-md-0">
              <label for="maxDays" class="form-label">Máximo de dias</label>
              <input type="number" class="form-control rounded-0" id="maxDays" name="days_available"
                     value="{{old('days_available')}}">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <label for="description" class="form-label">Descrição</label>
              <textarea class="form-control rounded-0" id="description" name="description"
                        rows="3">{{old('description')}}</textarea>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <button type="submit" class="btn btn-primary">Concluir</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
