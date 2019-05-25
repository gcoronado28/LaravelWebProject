@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h4 class="text-center border-bottom border-gray pb-4 m-2">Listado de platos</h4>
      @if(count($platos) > 0)
        @foreach($platos as $p)
          <div class="media text-muted pt-3">
            <div class="media-body pb-3 mr-2 ml-2 lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-dark">{{$p->codigo}}. {{$p->nombre}}</strong>
                <div>
                  <a href="/platos/{{$p->codigo}}" class="mr-3">Ver</a>
                </div>
              </div>
              <span class="d-block">{{$p->valor}}</span>
              <span class="d-block">{{$p->created_at}}</span>
            </div>
          </div>    
        @endforeach
      <div class="d-flex justify-content-between align-items-center w-100 mt-3">
        <a href="/platos/create" class="text-right m-1">Agregar plato</a>
        <div class="mt-2">
          {{$platos->links()}}
        </div>
      </div>
      @else
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-dark">No se encontraron platos</strong>
          <a href="/platos/create" class="d-block text-right">Agregar</a>
        </div>
      @endif
    </div>
</div>
@endsection
