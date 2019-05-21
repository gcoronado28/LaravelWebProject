@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h4 class="text-center p-2">Editar ingrediente</h4>
      <form method="POST" action="{{ route('ingredientes.update', $ingrediente->codigo) }}" class="m-4">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="nombreIngrediente">Nombre:</label>
          <input type="text" name="nombre" class="form-control" id="nombreIngrediente" placeholder="Ej: Queso suizo" value="{{$ingrediente->nombre}}">
        </div>
        <div class="form-group">
          <label for="nombreProveedor">Proveedor</label>
          <input type="text" name="proveedor" class="form-control" id="nombreProveedor" placeholder="Ej: Panes Ochoa SA" value="{{$ingrediente->proveedor}}">
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
      </form>
    </div>
</div>
@endsection