@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h4 class="text-center p-2">Orden {{ $orden->numero }}</h4>
      <form class="m-4" method="POST" action="{{ route('ordenes.update', $orden->numero) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="fechaOrden">Fecha</label>
          <input type="type" name="fecha" class="form-control" id="fechaOrden" placeholder="Ej: 5" value="{{ $orden->fecha }}" disabled>
        </div>
        <div class="form-group">
          <label for="mesaOrden">Número de mesa</label>
          <input type="number" name="nummesa" class="form-control" id="mesaOrden" placeholder="Ej: 5" value="{{ $orden->nummesa }}" disabled>
        </div>
        <div class="mt-5 mb-4">
          <h5 class="text-center mb-2">Platos de la orden</h5>
           <div class="table-responsive">
              <table class="table">
                @if(count($platosAdded) == 0)
                  <tbody>No se han agregado platos.</tbody>
                @else
                  <tbody>
                    @foreach($platosAdded as $pa)
                      <input type="hidden" name="orden" value="{{ $pa->pivot->numorden }}">
                      <tr>
                        <td>{{$pa->nombre}}</td>
                        <td>x{{$pa->pivot->cantidad}}</td>
                        <td>{{$pa->pivot->valor}} <span title="Pesos Colombianos">COP</span></td>
                      </tr>
                    @endforeach
                    @if($orden->estado == 'C')
                      <th>Total</th>
                      <td></td>
                      <th>{{ $valorTotal }} <span title="Pesos Colombianos">COP</span></th>
                    @endif
                  </tbody>
                @endif
              </table>
            </div>
        </div>
        @if($orden->estado == 'N')
          <a href="{{ route('ordenes.edit', $orden->numero) }}" class="btn btn-primary">Editar</a>
          @if(count($platosAdded) > 0) <button type="submit" class="btn btn-primary mr-2">Cerrar</button> @endif
        @endif
      </form>
    </div>
</div>
@endsection
