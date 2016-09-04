@extends('layouts\bootstrap')

@section('head')
<title>Nuevo contraseña</title>
<meta name='description' content='Nuevo contraseña'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
@stop

@section('content')

<h1>Nuevo contraseña:</h1>

{{Form::open(array(
            "method" => "POST",
            "action" => "HomeController@updatepassword",
            "role" => "form",
            ))}}
 
            <div class="form-group">
                {{Form::label("Email:")}}
                {{Form::input("email", "email", null, array("class" => "form-control"))}}
                <div class="bg-danger">{{$errors->first('email')}}</div>
            </div> 
            
            <div class="form-group">
                {{Form::label("Password:")}}
                {{Form::input("password", "password", null, array("class" => "form-control"))}}
                <div class="bg-danger">{{$errors->first('password')}}</div>
            </div>
            
            <div class="form-group">
                {{Form::label("Repetir password:")}}
                {{Form::input("password", "repetir_password", null, array("class" => "form-control"))}}
                <div class="bg-danger">{{$errors->first('repetir_password')}}</div>
            </div>
            
            <div class="form-group">
                {{Form::input("hidden", "_token", csrf_token())}}
                {{Form::input("hidden", "token", $token)}}
                {{Form::input("submit", null, "Recuperar password", array("class" => "btn btn-success"))}}
            </div>
            
{{Form::close()}}

@stop






