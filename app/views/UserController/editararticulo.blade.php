@extends('layouts/admin')

@section('head')
<title>Editar Historia {{$fila[0]->titulo}}</title>
<meta name='description' content='Editar Historia'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
@stop

@section('content')

<h1>Bienvenido {{Auth::user()->get()->nombre}}</h1>

{{Session::get("message")}}

<h3>Editar artículo - {{$fila[0]->titulo}}</h3>

{{Form::open(array(
            "method" => "POST",
            "action" => "UserController@editararticulo",
            "role" => "form",
            "enctype" => "multipart/form-data",
            ))}}

            <div class="form-group">
                {{Form::label("Título:")}}
                {{Form::input("text", "titulo", $fila[0]->titulo, array("class" => "form-control"))}}
                <div class="bg-danger">{{$errors->first('titulo')}}</div>
            </div>

            <div class="form-group">
                {{Form::label("Descripción:")}}
                {{Form::textarea("descripcion", $fila[0]->descripcion, array("class" => "form-control"))}}
                <div class="bg-danger">{{$errors->first('descripcion')}}</div>
            </div>

            <div class="form-group">
                <img src="{{URL::to('/').'/'.$fila[0]->src}}" width='150' height='150'>
                <hr>
                <small class='text-info'>¡Si incluyes una nueva imagen ésta reemplazará a la anterior!</small>
                <hr>
                {{Form::label("Nueva imagen:")}}
                {{Form::input("file", "src")}}
                <div class="bg-danger">{{$errors->first('src')}}</div>
            </div>

             <div class="form-group">
                {{Form::label("Direccion de correo para contactarte:")}}
                {{Form::input("text", "href", $fila[0]->href, array("class" => "form-control"))}}
                <div class="bg-danger">{{$errors->first('href')}}</div>
            </div>

            <div class="form-group">
                {{Form::input("hidden", "_token", csrf_token())}}
                {{Form::input("hidden", "id", $id)}}
                {{Form::input("submit", null, "Editar artículo", array("class" => "btn btn-primary"))}}
            </div>

{{Form::close()}}

@stop
