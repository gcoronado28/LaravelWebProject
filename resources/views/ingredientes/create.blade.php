@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h4 class="text-center p-2">Agregar ingrediente</h4>
      <form method="POST" action="{{ route('ingredientes.store') }}" class="m-4">
        @csrf
        <div class="form-group">
          <label for="nombreIngrediente">Nombre:</label>
          <input type="text" name="nombre" class="form-control" id="nombreIngrediente" placeholder="Ej: Queso suizo">
        </div>
        <div class="form-group">
          <label for="nombreProveedor">Proveedor</label>
          <input type="text" name="proveedor" class="form-control" id="nombreProveedor" placeholder="Ej: Panes Ochoa SA">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
    </div>
</div>
@endsection
