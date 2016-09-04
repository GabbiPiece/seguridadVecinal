@extends('layouts.bootstrap')

@section('head')
<title>Mis Cosas</title>
<meta name='title' content='Login'>
<meta name='description' content='Login'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
@stop

@section('content')
<h1> Bienvenido {{Auth::user()->get()->nombre }} </h1>
<div class="panel panel-default" class="center" >
      <div class="panel-body" class="center" >
  <h2>¿Que quieres hacer {{Auth::user()->get()->nombre }} ?</h2>
    <hr>
<a href="{{URL::route('creararticulo')}}" class="btn btn-success">Crear Historia</a>
<a href="{{URL::route('verarticulos')}}" class="btn btn-success">Ver Todas Historia</a>
<a href="alertas" class="btn btn-success">Alertas</a>
<a href="alertas/create" class="btn btn-success">Crear alerta</a>

</div>
</div>

<div class="panel panel-default" class="center" >
      <div class="panel-body" class="center" >
  <h2>Descripción de: {{Auth::user()->get()->nombre }} {{Auth::user()->get()->apellido }}</h2>
  <hr>
  <h5>	- Nombre: {{Auth::user()->get()->nombre }}</h5>
  <h5>	- Apellido: {{Auth::user()->get()->apellido }}</h5>
  <h5>	- Correo: {{Auth::user()->get()->email }}</h5>
  <h5>	- Numero telefonico: {{Auth::user()->get()->celular }}</h5>
  <h5>	- Barrio: {{Auth::user()->get()->zona_barrio }}</h5>
  <h5>	- Nombre de usuario: {{Auth::user()->get()->usuario }}</h3>
  <h5>  - Dirección: {{Auth::user()->get()->direccion }}</h3>


</div>
</div>
@stop

