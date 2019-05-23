@extends('layouts.app')

@section('content')
<div class="container">
  <a href="/platos" class="btn btn-light">Atrás</a>
  <form method="POST" action="{{ route('platos.update', $plato->codigo) }}" class="m-4">
    @csrf
    @method('PUT')
    <input name="ingsToDelete" class="d-none"></input>
    <div class="border p-3 mb-3">
      <h5 class="text-center mb-2">Información del plato</h5>
      <div class="form-group">
        <label for="nombrePlato">Nombre:</label>
        <input type="text" name="nombre" class="form-control" id="nombrePlato" placeholder="Ej: Queso suizo" value="{{$plato->nombre}}">
      </div>
      <div class="form-group">
        <label for="valorPlato">Valor</label>
        <input type="text" name="valor" class="form-control" id="valorPlato" placeholder="Ej: Panes Ochoa SA" value="{{$plato->valor}}">
      </div>
    </div>
    <div class="border p-3 mb-3">
      <h5 class="text-center mb-2">Ingredientes del plato</h5>
      <div id="badges" class="form-group">
        @if(count($ingredientesAdded) < 0)
          <p>No hay ingredientes agregados</p>
        @endif
        @foreach($ingredientesAdded as $ia)
        <span class="chip btn btn-sm btn-secondary mr-1 mb-1" id="{{$ia->id}}">
          {{$ia->nombre}}&nbsp;&nbsp;<span class="badge badge-light"> x {{$ia->cantidad}}</span>
        </span>
        <span class="delIng text-danger mr-4" style="cursor:pointer;"><strong >X</strong></span>
      @endforeach
      </div>
    </div>
    <div class="border p-3 mb-3">
      <h5 class="addIngTitle text-center mb-2" style="text-decoration:underline;cursor:pointer;">Agregar ingredientes</h5>
      <div class="form-row d-none">
        <div class="form-group col-lg-8 col-md-8 col-sm-6">
          <label for="inputCity">Ingrediente</label>
          <select name="ingrediente" class="form-control">
            <option selected="selected" disabled>Seleccione un ingrediente</option>
            @foreach($ingredientes as $i)
              <option value="{{$i->codigo}}">{{$i->nombre}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-6">
          <label for="inputState">Cantidad</label>
          <input type="number" name="cantidad" class="form-control" id="cantidad">
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-secondary">Guardar</button>
    </form>
</div>
@endsection