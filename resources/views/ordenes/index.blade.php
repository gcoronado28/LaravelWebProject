@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h4 class="text-center border-bottom border-gray pb-4 m-2">Listado de órdenes</h4>
      @if(count($ordenes) > 0)
        @foreach($ordenes as $o)
          <div class="media text-muted pt-3">
            <div class="media-body pb-3 mr-2 ml-2 lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-dark">Orden {{$o->numero}}. Mesa {{$o->nummesa}}</strong>
                <div>
                  <a href="{{ route('ordenes.show', $o->numero) }}" class="mr-3">Ver</a>
                </div>
              </div>
              <span class="d-block">{{$o->fecha}}</span>
              @if($o->estado=='C')
                <span class="d-block">Cerrada.</span>
              @else
                <span class="d-block">Abierta.</span>
              @endif
            </div>
          </div>    
        @endforeach
      <div class="d-flex justify-content-between align-items-center w-100 mt-3">
        <a href="{{ route('ordenes.create') }}" class="text-right m-1">Agregar orden</a>
        <div class="mt-2">
          {{$ordenes->links()}}
        </div>
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
