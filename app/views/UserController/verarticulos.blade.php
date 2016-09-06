@extends('layouts.bootstrap')

@section('head')
<title>Ver mis artículos</title>
<meta name='description' content='Ver mis artículos'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='All'>
@stop

@section('content')

<h1>Bienvenido {{Auth::user()->get()->nombre}}</h1>

<h3>Ver mis aportes</h3>
<div class="panel panel-default">
      <div class="panel-body">

{{ Form::open(array
            (
            'action' => 'UserController@verarticulos',
            'method' => 'GET',
            'role' => 'form',
            'class' => 'form-inline'
            ))
}}
{{ Form::input('text', 'buscar', Input::get('buscar'), array('class' => 'form-control') )}}
{{ Form::input('submit', null, 'Buscar', array('class' => 'btn btn-primary'))}}
{{Form::close()}}


<label class="label label-info">Página {{$paginacion->getCurrentPage()}}. {{$paginacion->getTotal()}} resultados</label>
</div>
 </div>
<?php foreach($paginacion as $fila): ?>

<div class="panel panel-default">
      <div class="panel-body">
<div class="row">
        <div class='col-md-3'>
            <img src="{{URL::to('/').'/'.$fila->src}}" title="{{$fila->titulo}}" width="150" height="150">
        </div>
        <div class='col-md-9'>
            <a href="{{URL::route('editararticulo', array('ide_usuario' => $fila->ide_usuario))}}" class="btn btn-primary">Editar</a>           
            <a href="{{URL::route('eliminararticulo', array('ide_usuario' => $fila->ide_usuario))}}"  class="btn btn-primary" >Eliminar</a>
            <h3><a href="{{URL::route('articulo', array('ide_usuario'=>$fila->ide_usuario))}}">{{$fila->titulo}}</a></h3>
            URL:<a href="{{$fila->href}}" target="_blank">{{$fila->href}}</a> <br>
         <br>
            {{$fila->descripcion}}
        </div>
</div>
<hr>
<?php endforeach; ?>
</div>
 </div>
<div class="container">
    {{$paginacion->appends(array("buscar" => Input::get("buscar")))->links()}}
</div>

@stop
