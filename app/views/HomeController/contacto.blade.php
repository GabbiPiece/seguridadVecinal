@extends('layouts.bootstrap')

@section('head')
<title>Contactanos</title>
<meta name='title' content='Contactanos'>
<meta name='description' content='Contactanos'>
<meta name='keywords' content='palabras, clave'>
<meta name='robots' content='noindex,nofollow'>
<link rel="stylesheet" type="text/css" href="assets/css/style/contacto.css">
@stop


<div class="jumbotron jumbotron-sm">
    <div class="container" >
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                   ¿Dudas, Sugerencias? <small>Sientase libre de contactarnos</small></h1>
            </div>
        </div>
    </div>
</div>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-md-6">
                        {{$mensaje}}
						{{Form::open(array(

							'action' => 'HomeController@contacto',
							'method' => 'POST',
							'role' => 'form',
						))
						}}
						<div class="form-group">
						{{Form::label('Nombre:')}}
						{{Form::input('text', 'name', null, array('class' => 'form-control'))}}
						</div>

						<div class="form-group">
						{{Form::label('Email:')}}
						{{Form::input('email', 'email', null, array('class' => 'form-control'))}}
						</div>

						<div class="form-group">
						{{Form::label('Asunto:')}}
						{{Form::input('text', 'subject', null, array('class' => 'form-control'))}}
						</div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">	
							{{Form::label('Mensaje:')}}
							{{Form::textarea('msg', null, array('class' => 'form-control'))}}
						</div>
                    </div>

                    <div class="col-md-12">
                        {{Form::input('hidden', 'contacto')}}
						{{Form::input('submit', null, 'Enviar', array('class' => 'btn btn-primary pull-right'))}}
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span>Nuestra oficinas</legend>
            <address>
                <strong>Seguridad Vecinal, Inc.</strong><br>
                San Rafael, CP 5600<br>
                <abbr title="Phone">
                    TEL:</abbr>
                (2604) 061093
            </address>
            <address>
                <strong>Email</strong><br>
                <a href="mailto:#">gabi.carp26@gamil.com</a>
            </address>
            </form>
        </div>
    </div>
</div>

{{ Form::close() }}

@stop