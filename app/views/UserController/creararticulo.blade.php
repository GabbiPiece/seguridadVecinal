@extends('layouts.bootstrap')

@section('head')
<title>Crear un nuevo artículo</title>
<meta name='description' content='Crear un nuevo artículo'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
@stop

@section('content')

<h1>Bienvenido {{Auth::user()->get()->user}}</h1>

{{Session::get("message")}}

<h3>Crear un nuevo artículo</h3>

{{Form::open(array(
            "method" => "POST",
            "action" => "UserController@creararticulo",
            "role" => "form",
            "enctype" => "multipart/form-data",
            ))}}
 
            <div class="form-group">
                {{Form::label("Título:")}}
                {{Form::input("text", "titulo", null, array("class" => "form-control"))}}
                <div class="bg-danger">{{$errors->first('titulo')}}</div>
            </div> 
            
            <div class="form-group">
                {{Form::label("Descripción:")}}
                {{Form::textarea("descripcion", null, array("class" => "form-control"))}}
                <div class="bg-danger">{{$errors->first('descripcion')}}</div>
            </div>
            
            <div class="form-group">
                {{Form::label("Subir imagen:")}}
                {{Form::input("file", "src")}}
                <div class="bg-danger">{{$errors->first('src')}}</div>
            </div>
            
             <div class="form-group">
                {{Form::label("Sitio web:")}}
                {{Form::input("text", "href", null, array("class" => "form-control"))}}
                <div class="bg-danger">{{$errors->first('href')}}</div>
            </div>
            
            <div class="form-group">
                {{Form::input("hidden", "_token", csrf_token())}}
                {{Form::input("submit", null, "Crear artículo", array("class" => "btn btn-primary"))}}
            </div>
            
{{Form::close()}}

@stop


