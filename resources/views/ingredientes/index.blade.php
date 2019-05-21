@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h4 class="text-center border-bottom border-gray pb-4 m-2">Listado de ingredientes</h4>
      @if(count($ingredientes) > 0)
        @foreach($ingredientes as $i)
          <div class="media text-muted pt-3">
            <div class="media-body pb-3 mr-2 ml-2 lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-dark">{{$i->codigo}}. {{$i->nombre}}</strong>
                <a href="/ingredientes/{{$i->codigo}}/edit">Editar</a>
              </div>
              <span class="d-block">{{$i->proveedor}}</span>
              <span class="d-block">{{$i->created_at}}</span>
            </div>
          </div>    
        @endforeach
      <div class="d-flex justify-content-between align-items-center w-100 mt-3">
        <a href="/ingredientes/create" class="text-right m-1">Agregar ingrediente</a>
        <div class="mt-2">
          {{$ingredientes->links()}}
        </div>
      </div>
      @else
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-dark">No se encontraron ingredientes</strong>
          <a href="/ingredientes/create" class="d-block text-right">Agregar</a>
        </div>
      @endif
      
    </div>
</div>
@endsection
