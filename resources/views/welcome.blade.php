@extends('layouts.app')

@section('content')
   <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Bienvenidos</h1>
      <p class="lead">Disfrute de una estupenda comida junto con una calidad excelente.</p>
    </div>
    <br />
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-12">
          <img src="https://cdn.pixabay.com/photo/2014/01/23/19/34/french-fries-250641_960_720.jpg" class="mb-2 rounded img-fluid" alt="Responsive image">
          @auth
            <a href="/ingredientes" class="mb-4 btn btn-outline-secondary" style="width:100%;">Ingredientes</a>
          @endauth
        </div>
        <div class="col-md-4 col-sm-12">
          <img src="https://cdn.pixabay.com/photo/2017/03/05/01/40/burger-2117465_960_720.jpg" class="mb-2 rounded img-fluid" alt="Responsive image">
          @auth
            <a href="/platos" class="mb-4 btn btn-outline-secondary" style="width:100%;">Platos</a>
          @endauth
        </div>
        <div class="col-md-4 col-sm-12">
          <img src="https://cdn.pixabay.com/photo/2017/01/22/19/20/pizza-2000615_960_720.jpg" class="mb-2 rounded img-fluid" alt="Responsive image">
          @auth
            <a href="/ordenes" class="mb-4 btn btn-outline-secondary" style="width:100%;">Órdenes</a>
          @endauth
        </div>
      </div>
    </div>
@endsection