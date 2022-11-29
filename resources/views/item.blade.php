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

  <div class="container mt-5 text-center">
    <div class="row align-items-center">
      <div class="col-md-4 mb-lg-0 mb-3 text-center">
        <img src="{{asset('storage/'.$item->image)}}" alt="Imagem do Item" class="img-fluid">
      </div>
      <div class="col-md-4">
        <div class="row">
          <h2 class="fs-6 text-center text-md-start fw-bold">{{$item->title}}</h2>
        </div>

        <div class="row">
          <p class="text-center description text-md-start">{{$item->description}}</p>
        </div>

      </div>
      <div class="col-md-4">
        <form action="{{route('reserve', ['item' => $item])}}" method="POST">
          @csrf
          <label for="start_date" class="form-label">Data de Retirada</label>
          <input id="start_date" type="text" name="start_date" class="form-control">

          <label for="end_date" class="form-label mt-2">Data de Entrega</label>
          <input id="end_date" type="text" name="end_date" class="form-control">

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
    <script type="module">
      const options = {
        buttonClass: 'btn',
        autohide: true,
        daysOfWeekDisabled: [0, 6],
        showDaysOfWeek: true,
        minDate: new Date().toLocaleDateString(),
      }
      const elem = document.querySelector('input[name="start_date"]');
      const elem2 = document.querySelector('input[name="end_date"]');

      const datepicker = new Datepicker(elem, options);
      const datepicker2 = new Datepicker(elem2, options);
      
    </script>
  @endpush
@endsection
