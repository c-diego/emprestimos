@extends('templates.html')

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
    <div class="row align-items-center">
      <div class="col col-sm-2 text-center">
        <img src="{{$item->image}}" alt="Imagem do Item" class="img-fluid">
      </div>
      <div class="col">
        <div class="row">
          <h2 class="fs-6 text-center text-md-start fw-bold">{{$item->title}}</h2>
        </div>

        <div class="row">
          <p class="text-center description text-md-start">{{$item->description}}</p>
        </div>

        <div class="row">
          <h3 class="fs-6 text-center text-md-start fw-bold">Observações</h3>
          <p class="text-center description text-md-start">{{$item->observation}}</p>
        </div>
      </div>
      <div class="col">
        <form action="{{route('reserve', ['item' => $item])}}" method="POST">
          @csrf
          <label for="startDate" class="form-label">Data de Retirada</label>
          <input id="startDate" type="date" name="startDate" min="{{date('Y-m-d')}}" required value="{{ old('startDate') }}"
                 class="form-control">

          <label id="daysDevolutionLabel" for="daysDevolution" class="form-label mt-2">Devolver em 1 Dia(s)</label>
          <input id="daysDevolution" type="number" name="daysDevolution" min="1" max="{{$item->days_available}}" required
                 value="{{ old('days_available') }}" class="form-control">

          <label for="amount" class="form-label mt-2">Quantidade</label>
          <input id="amount" type="number" name="amount" max="{{$item->amount}}" min="1" required
                 value="{{ old('amount') }}" class="form-control">

          <div class="row justify-content-evenly">
            <a href="{{route('home')}}" class="btn btn-danger rounded-0 fw-semibold ps-md-5 pe-md-5 pt-1 pb-1 mt-3">Cancelar
            </a>
            <button type="submit" class="btn btn-primary rounded-0 fw-semibold ps-md-5 pe-md-5 pt-1 pb-1 mt-3">Confirmar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @push('scripts')
    <script>
      document.getElementById('daysDevolution').onchange = changeLabel;
      function changeLabel() {
        var days = document.getElementById('daysDevolution').value;
        document.getElementById('daysDevolutionLabel').innerHTML = "Devolver em " + days + " Dia(s)";
      }
    </script>
  @endpush

@endsection
