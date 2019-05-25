@extends('layouts.app')

@section('content')

<div class="modal fade" id="agregarPlato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva relación de orden-plato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('ordenes.relate', $orden->numero) }}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="inputPlato" class="col-form-label">Plato</label>
            <select id="inputPlato" name="plato" class="form-control" required>
              <option selected="selected" value="">Seleccione un plato</option>
                @foreach($platos as $p)
                  <option value="{{$p->codigo}}">{{$p->nombre}} - ${{$p->valor}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="cantidad" class="col-form-label">Cantidad</label>
            <input type="number" step="0.00001" name="cantidad" class="form-control" id="cantidad" min="1" required>
          </div>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancelar</button>
            <button id="addIng" type="submit" class="btn btn-primary">Agregar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h4 class="text-center p-2">Orden {{ $orden->numero }}</h4>
      <form class="m-4">
        @csrf
        <div class="form-group">
          <label for="fechaOrden">Fecha</label>
          <input type="type" name="fecha" class="form-control" id="fechaOrden" placeholder="Ej: 5" value="{{ $orden->fecha }}" disabled>
        </div>
        <div class="form-group">
          <label for="mesaOrden">Número de mesa</label>
          <input type="number" name="nummesa" class="form-control" id="mesaOrden" placeholder="Ej: 5" value="{{ $orden->nummesa }}" disabled>
        </div>
        <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#agregarPlato" data-whatever="@mdo">Agregar Platos</button>
        @if(count($platosAdded) == 0)
          <button type="submit" class="btn btn-primary" disabled >Cerrar Orden</button>
        @else
          <a href="{{ route('ordenes.show', $orden->numero) }}" class="btn btn-primary" >Cerrar Orden</a>
        @endif
      </form>
    </div>
  
    <div class="bg-white rounded shadow-sm border p-3 mb-3">
      <h5 class="text-center mb-2">Platos de la orden</h5>
       <div class="table-responsive">
         <form action="{{ route('orden.unrelate') }}" method="POST">
          <table class="table">
            <tbody>
              @csrf
              @foreach($platosAdded as $pa)
                <input type="hidden" name="orden" value="{{ $pa->pivot->numorden }}">
                <tr>
                  <td>{{$pa->nombre}}</td>
                  <td>x{{$pa->pivot->cantidad}}</td>
                  <td>{{$pa->pivot->valor}} <span title="Pesos Colombianos">COP</span></td>
                  <td>
                    <button class="btn btn-link" type="submit" name="ordenPlato" value="{{ $pa->pivot->id }}">Eliminar</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
            </table>
          </form>
       </div>
    </div>
</div>
@endsection
