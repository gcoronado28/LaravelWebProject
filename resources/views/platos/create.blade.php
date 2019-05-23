@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h4 class="text-center p-2">Agregar plato</h4>
      <form method="POST" action="{{ route('platos.store') }}" class="m-4">
        @csrf
        <div class="form-group">
          <label for="nombrePlato">Nombre:</label>
          <input type="text" name="nombre" class="form-control" id="nombrePlato" placeholder="Ej: Perro Sencillo">
        </div>
        <div class="form-group">
          <label for="valorPlato">Valor</label>
          <input type="number" name="valor" class="form-control" id="valorPlato" placeholder="Ej: 2500">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
    </div>
</div>
@endsection
