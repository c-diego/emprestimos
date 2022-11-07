<div class="modal modal-xl" id="modal{{$selectedItem->id}}">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col text-center">
              <img src="{{$selectedItem->image}}" alt="Imagem do Item" class="img-fluid">
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
              <form action="{{route('request')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Data de Retirada
                    <input type="date" class="form-control" name="startDate" min="{{date('Y-m-d')}}" required>
                  </label>
                </div>
                <div class="mb-3">
                  <label class="form-label">Data de Entrega
                    <input type="date" class="form-control" name="endDate" min="{{date('Y-m-d')}}"
                           max="{{date('Y-m-d', strtotime($item->days_available ." days"))}}" required>
                  </label>
                </div>
                <div class="mb-3">
                  <label class="form-label">Quantidade
                    <input type="number" name="amount" max="{{$item->amount}}" min="1" class="form-control" required>
                  </label>
                </div>
                <button type="submit" class="btn btn-primary rounded-0 fw-semibold ps-md-5 pe-md-5 pt-1 pb-1">Confirmar
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
