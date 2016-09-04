@extends('layouts.bootstrap')

@section('head')
<title>Registro</title>
<meta name='description' content='Registro'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
<link rel="stylesheet" type="text/css" href="assets/css/style/registro.css">

@stop

@section('content')

<h1>Formulario de Registro</h1>
<div class="panel panel-default" class="center" >
      <div class="panel-body" class="center" >
{{Session::get("message")}}

{{Form::open(array(
            "method" => "POST",
            "action" => "HomeController@register",
            "role" => "form",
            ))}}

            <div class="form-group">
                {{Form::label("Nombre:")}}
                {{Form::input("text", "nombre", null, array("class" => "form-control" , 'placeholder'=>'Ingrese su nombre, debe tener solo letras'))}}
                <div class="bg-danger">{{$errors->first('nombre')}}</div>
            </div>

            <div class="form-group">
                {{Form::label("Apellido:")}}
                {{Form::input("text", "apellido", null, array("class" => "form-control" , 'placeholder'=>'Ingrese su apellido, debe tener solo letras'))}}
                <div class="bg-danger">{{$errors->first('apellido')}}</div>
            </div>

            <div class="form-group">
                {{Form::label("Celular:")}}
                {{Form::input("text", "celular", null, array("class" => "form-control" , 'placeholder'=>'Ingrese su telefono, debe tener solo numeros'))}}
                <div class="bg-danger">{{$errors->first('celular')}}</div>
            </div>
             <div class="form-group">
                {{Form::label("Direccion")}}
                {{Form::input("text", "direccion", null, array("class" => "form-control", 'placeholder'=>'Ingrese su dirección, debe tener solo letras y numeros, ej: Iselin 1231' ))}}
                <div class="bg-danger">{{$errors->first('direccion')}}</div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Seleccione un Barrio: </label>
                <div class="col-sm-10 ">
               {{Form::select('zona_id', $combobox,['class'=>'form-control'])}}
                </div>
            </div>

            <div class="form-group">
                {{Form::label("Nombre de Usuario:")}}
                {{Form::input("text", "usuario", null, array("class" => "form-control" , 'placeholder'=>'Ingrese su nombre de usuario, puede tener letras y numeros'))}}
                <div class="bg-danger">{{$errors->first('usuario')}}</div>
            </div>

            <div class="form-group">
                {{Form::label("Email:")}}
                {{Form::input("email", "email", null, array("class" => "form-control" , 'placeholder'=>'Ingrese su email' ))}}
                <div class="bg-danger">{{$errors->first('email')}}</div>
            </div>

            <div class="form-group">
                {{Form::label("Password:")}}
                {{Form::input("password", "password", null, array("class" => "form-control" , 'placeholder'=>'Ingrese su clave, debe tener mas de 8 caracteres'))}}
                <div class="bg-danger">{{$errors->first('password')}}</div>
            </div>

            <div class="form-group">
                {{Form::label("Repetir password:")}}
                {{Form::input("password", "repetir_password", null, array("class" => "form-control", 'placeholder'=>'Ingrese su clave, debe repetir su clave anterior'))}}
                <div class="bg-danger">{{$errors->first('repetir_password')}}</div>
            </div>

            <div class="form-group">
                {{Form::label("Aceptar los términos y condiciones:")}}
                {{Form::input("checkbox", "terminos", "On")}} <a class="btn btn-success btn-xs" href="/segveci/public/condiciones" TARGET="_new" role="button">Términos y Condiciones</a>
                <div class="bg-danger">{{$errors->first('terminos')}} </div>

            </div>

            <div class="form-group">
                {{Form::input("hidden", "_token", csrf_token())}}
                {{Form::input("submit", null, "Registrarme", array("class" => "btn btn-success"))}}

            </div>

{{Form::close()}}

</div>
</div>
@stop
