@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h4 class="text-center p-2">Abrir orden</h4>
      <form method="POST" action="{{ route('ordenes.store') }}" class="m-4">
        @csrf
        <div class="form-group">
          <label for="mesaOrden">Número de mesa</label>
          <input type="number" name="nummesa" class="form-control" id="mesaOrden" placeholder="Ej: 5">
        </div>
        <button type="submit" class="btn btn-primary mr-2">Abrir</button>
        <button type="submit" class="btn btn-primary mr-2" disabled >Agregar Platos</button>
        <small class="form-text text-muted mt-3">La fecha de la orden se guardará de forma automática basada en el momento de creación.</small>
      </form>
    </div>
</div>
@endsection
