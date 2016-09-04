@extends('layouts.admin')

@section('head')
<title>Eliminar historia {{$fila[0]->titulo}}</title>
<meta name='description' content='Eliminar historia'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
@stop

@section('content')

<h1>Bienvenido {{Auth::user()->get()->nombre}}</h1>

<h3>Eliminar historia: {{$fila[0]->titulo}}</h3>

{{Form::open(array(
            "method" => "POST",
            "action" => "UserController@eliminararticulo",
            "role" => "form",
            ))}}
            
            <div class="form-group">
                {{Form::label("¿Estás seguro de que quieres eliminar la historia?")}}
                {{Form::input("hidden", "_token", csrf_token())}}
                {{Form::input("hidden", "id", $fila[0]->id)}}
                {{Form::input("submit", null, "Eliminar historia", array("class" => "btn btn-danger"))}}
            </div>
            
{{Form::close()}}

@stop

