@extends('layouts.bootstrap')

@section('head')
<title>Iniciar Secion</title>
<meta name='title' content='Iniciar Secion'>
<meta name='description' content='Iniciar Secion'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
<link rel="stylesheet" type="text/css" href="assets/css/style/login.css">
@stop

@section('content')
<div class="login-body">

{{Session::get("message")}}

{{Form::open(array(
            "method" => "POST",
            "action" => "HomeController@login",
            "role" => "form",
            ))}}
    <article class="container-login center-block">
        <section>
        
            <div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
               <div id="login-access" class="tab-pane fade active in">
                    <h2><i class="glyphicon glyphicon-log-in"></i> Login</h2> 
        
                    <div class="form-group">
                        {{Form::label("Email:")}}
                        {{Form::input("text", "email", null, array("class" => "form-control"))}}
                    </div> 
                    
                    <div class="form-group">
                        {{Form::label("Password:")}}
                        {{Form::input("password", "password", null, array("class" => "form-control"))}}
                    </div>
                    
                    <div class="form-group">
                        {{Form::label("Recordar sesión:")}}
                        {{Form::input("checkbox", "remember", "On")}}
                    </div> 
                    <div class="form-group">
                        {{Form::input("hidden", "_token", csrf_token())}}
                        {{Form::input("submit", null, "Iniciar sesión", array("class" => "btn btn-success"))}}
                    
                    </div>
                    <div ALIGN="right" > <a href="{{URL::route('recoverpassword')}}" >¿Olvidaste tu contraseña?</a> </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
            
{{Form::close()}}
</div>
@stop


