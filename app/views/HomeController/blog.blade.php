btn-success 
@extends('layouts.bootstrap')
@section('head')
<h1>
	<title> Blog Seguridad Vecinal</title>
    <meta name='description' content='Seguridad Vacinal'>
    <meta name='keywords' content='palabras, clave'>
    <meta name='robots' content='All'>

<br>
<br>
  <h1><p class="jumbotron"  align="center">Blog Seguridad Vecinal</p> </h1>  
<br>
<div >
<div class="panel panel-default">
      <div class="panel-body">
      
     
{{ Form::open(array
            (
            'action' => 'HomeController@blog', 
            'method' => 'GET',
            'role' => 'form',
            'class' => 'form-inline'
            )) 
}}
{{ Form::input('text', 'buscar', Input::get('buscar'), array('class' => 'form-control') )}}
{{ Form::input('submit', null, 'Buscar', array('class' => 'btn btn-success '))}}
{{Form::close()}}



<label class="label label-success" >Página {{$paginacion->getCurrentPage()}}. {{$paginacion->getTotal()}} resultados</label>

</div>
 </div>
    </div>
<?php foreach($paginacion as $fila): ?>
<div class="panel panel-default">
      <div class="panel-body">
<div class="jumbotron" >
    <div class="row">
            <div class='col-md-3'>
                <img  src="{{URL::to('/').'/'.$fila->src}}" title="{{$fila->titulo}}" width="100" height="100">
            </div>
            <div  class='col-md-9' >
                <h3><a href="{{URL::route('articulo', array('id' => $fila->id))}}">{{$fila->titulo}}</a></h3>
                URL:<a href="{{$fila->href}}" target="_blank">{{$fila->href}}</a>
                <hr>
                {{$fila->descripcion}}
            </div>
    </div>
<hr></div>
<?php endforeach; ?>
 </div>
    </div>
<div  class="container">
    {{$paginacion->appends(array("buscar" => Input::get("buscar")))->links()}}
</div>

@stop