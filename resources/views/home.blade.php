@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h6 class="border-bottom border-gray pb-2 mb-0">Ingredientes</h6>
      @if(count($ingredientes) > 0)
        @foreach($ingredientes as $i)
          <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-dark">{{$i->nombre}}</strong>
                <a href="/ingredientes/{{$i->codigo}}/edit">Editar</a>
              </div>
              <span class="d-block">{{$i->proveedor}}</span>
            </div>
          </div>    
        @endforeach
      @else
        <div class="mt-3 d-flex justify-content-between align-items-center w-100">
          <strong class="text-dark">No se encontraron ingredientes</strong>
        </div>
      @endif
      <div class="d-flex justify-content-between align-items-center w-100">
        <small class="d-inline text-uppercase text-left mt-3">
          <a href="/ingredientes/create">Agregar Ingrediente</a>
        </small>
        <small class="d-inline text-uppercase text-right mt-3">
          <a href="/ingredientes">Ver todos</a>
        </small>
      </div>
    </div>
    <hr>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h6 class="border-bottom border-gray pb-2 mb-0">Platos</h6>
      @if(count($platos) > 0)
        @foreach($platos as $p)
          <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-dark">{{$p->nombre}}</strong>
                <a href="/platos/{{$p->codigo}}/edit">Editar</a>
              </div>
              <span class="d-block">{{$p->valor}}</span>
            </div>
          </div>    
        @endforeach
      @else
        <div class="mt-3 d-flex justify-content-between align-items-center w-100">
          <strong class="text-dark">No se encontraron platos</strong>
        </div>
      @endif
      <div class="d-flex justify-content-between align-items-center w-100">
        <small class="d-inline text-uppercase text-left mt-3">
          <a href="/platos/create">Agregar Plato</a>
        </small>
        <small class="d-inline text-uppercase text-right mt-3">
          <a href="/platos">Ver todos</a>
        </small>
      </div>
    </div>
</div>
@endsection
