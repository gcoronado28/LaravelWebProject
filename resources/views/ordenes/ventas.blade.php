@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h4 class="text-center border-bottom border-gray pb-4 m-2">Listado de órdenes cerradas el {{$ordenes->first()->fecha}}</h4>
      @if(count($ordenes) > 0)
        @foreach($ordenes as $o)
          <div class="media text-muted pt-3">
            <div class="media-body pb-3 mr-2 ml-2 lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-dark">Orden {{$o->numero}}. Mesa {{$o->nummesa}}</strong>
              </div>
              @foreach($o->platos()->get() as $p)
              <span class="d-block">{{$p->pivot->cantidad}} unidad(es) de {{$p->nombre}} = {{$p->pivot->valor}} pesos </span>
              @endforeach
              <span class="d-block">Valor Total: {{$o->valorTotal()}} pesos </span>
            </div>
          </div>    
        @endforeach
      <div class="d-flex justify-content-between align-items-center w-100 mt-3">
        <p lass="text-right m-1"><strong>VALOR TOTAL DEL DÍA: {{$valorTotalDia}} pesos</strong></p>
      </div>
      @else
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-dark">No se encontraron órdenes</strong>
          <a href="{{ route('ordenes.create') }}" class="d-block text-right">Agregar</a>
        </div>
      @endif
    </div>
</div>
@endsection
