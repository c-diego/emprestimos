<div class="modal modal-xl" id="modal{{$selectedItem->id}}">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">


      <!-- Modal body -->
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
                <p class="text-center description text-md-start">{{$item->title}}</p>
              </div>
            </div>
            <div class="col">
              <form>
                <div class="mb-3">
                  <label for="pickupdate" class="form-label">Data de Retirada</label>
                  <input type="date" class="form-control" id="pickupdate">
                </div>
                <div class="mb-3">
                  <label for="deliverydate" class="form-label">Data de Entrega</label>
                  <input type="date" class="form-control" id="deliverydate">
                </div>
                <div class="mb-3">
                  <label for="amount" class="form-label">Quantidade</label>
                  <input type="number" class="form-control" id="amount">
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
