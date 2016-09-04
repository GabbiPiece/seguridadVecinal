@extends('layouts\admin')
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.theme.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
@section('head')
<title>{{$fila[0]->titulo}}</title>
<meta name='description' content='{{$fila[0]->descripcion}}'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='All'>

@stop

@section('content')

<h1>{{$fila[0]->titulo}}</h1>

<hr>
{{ Form::open(array
            (
            'action' => 'HomeController@blog', 
            'method' => 'GET',
            'role' => 'form',
            'class' => 'form-inline'
            )) 
}}
{{ Form::input('text', 'buscar', Input::get('buscar'), array('class' => 'form-control') )}}
{{ Form::input('submit', null, 'Buscar', array('class' => 'btn btn-primary'))}}
{{Form::close()}}
<hr>
<div class="jumbotron" align="center" class='col-md-3'>
            <img src="{{URL::to('/').'/'.$fila[0]->src}}" title="{{$fila[0]->titulo}}" width="700" height="600" >
        </div>
</div>
<div class="jumbotron" align="center" class="row">
        
        <div class="jumbotron" class='col-md-9'>
            <h3><a href="{{URL::route('articulo', array('id'=>$fila[0]->id))}}">{{$fila[0]->titulo}}</a></h3>
            URL:<a href="{{$fila[0]->href}}" target="_blank">{{$fila[0]->href}}</a>
            <hr>
            {{$fila[0]->descripcion}}
        </div>

<hr>

@stop
