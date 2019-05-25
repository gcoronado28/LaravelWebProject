@extends('layouts.app')

@section('content')
<div class="modal fade" id="agregarIngrediente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva relación de ingrediente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('platos.relate', $plato->codigo) }}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="inputIngrediente" class="col-form-label">Ingrediente</label>
            <select id="inputIngrediente" name="ingrediente" class="form-control" required>
              <option selected="selected" value="">Seleccione un ingrediente</option>
              @foreach($ingredientes as $i)
                <option value="{{$i->codigo}}">{{$i->nombre}}</option>
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
  <div class="d-flex">
    <a href="{{ URL::previous() }}" class="btn btn-primary mr-2" style="height: 100%;">Atrás</a>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarIngrediente" data-whatever="@mdo">Agregar Ingrediente</button>
  </div>
  <form method="POST" action="{{ route('platos.update', $plato->codigo) }}" class="mt-4">
    @csrf
    @method('PUT')
    <input name="ingsToDelete" class="d-none"></input>
    <div class="bg-white rounded shadow-sm border p-3 mb-3">
      <h5 class="text-center mb-2">Información del plato</h5>
      <div class="form-group">
        <label for="nombrePlato">Nombre:</label>
        <input type="text" name="nombre" class="form-control" id="nombrePlato" placeholder="Ej: Queso suizo" value="{{$plato->nombre}}">
      </div>
      <div class="form-group">
        <label for="valorPlato">Valor</label>
        <input type="text" name="valor" class="form-control" id="valorPlato" placeholder="Ej: Panes Ochoa SA" value="{{$plato->valor}}">
      </div>
      <small id="smallEdit" class="form-text text-muted d-none">Presiona Actualizar si deseas guardar los cambios, o descártalos.</small>
    </div>
    <div class="bg-white rounded shadow-sm border p-3 mb-3">
      <h5 class="text-center mb-2">Ingredientes del plato</h5>
      <div id="badges" class="form-group">
        @if(count($ingredientesAdded) < 0)
          <p>No hay ingredientes agregados</p>
        @endif
        @foreach($ingredientesAdded as $ia)
        <div class="d-inline">
          <span class="chip btn btn-sm btn-secondary mb-1" id="{{$ia->id}}">
            {{$ia->nombre}}&nbsp;&nbsp;<span class="badge badge-light">{{$ia->cantidad}}</span>
          </span>
          <span class="delIng text-danger mr-3" style="cursor:pointer;"><strong >X</strong></span>
        </div>
      @endforeach
      </div>
      <small id="smallDelete" class="form-text text-muted d-none">Presiona Actualizar para guardar los cambios, o descártalos.</small>
    </div>
    
    <button id="updateBtn" type="submit" class="btn btn-primary" disabled>Actualizar</button>
    <button id="deleteBtn" type="button" class="btn btn-secondary" onclick="event.preventDefault(); location.reload(true);" disabled>Descartar</button>
    </form>
</div>
@endsection