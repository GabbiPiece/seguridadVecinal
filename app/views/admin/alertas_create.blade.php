@extends ('layouts/admin')

@section ('title') Nueva Alerta-Sistema Alerta @stop

@section ('content')

<div class="col-md-12">
    {{ Form::open(array('url' => 'alertas/store', 'method' => 'POST', 'class' => 'form-horizontal'))   }}
    <fieldset>
        <legend><h1> Nueva Alerta </h1></legend>
        <h1> Crea tu alerta {{Auth::user()->get()->nombre }} </h1>
        <br>
        <br>


         <div class="form-group">
            <label class="col-sm-2 control-label" for="">Dirección:</label>
            <div class="col-sm-10 ">
                {{ Form::text('ale_direccion', Auth::user()->get()->direccion, array('class' => 'form-control', 'placeholder'=>'Ingrese su direccion', 'id' =>'ale_direccion')) }}
                @if($errors->has('ale_direccion'))
                <p class="text-danger">{{ $errors->first('ale_direccion') }}</p>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="">Seleccione un Barrio: </label>
            <div class="col-sm-10 ">
           {{Form::select('zona_id', $combobox, Auth::user()->get()->zona_id)}}
            </div>
        </div>

    <!--usuario nombre-->
        <div class="form-group">
            <label class="col-sm-2 control-label" for=""></label>
            <div class="col-sm-10 ">
                {{ Form::hidden('ide_usuario', Auth::user()->get()->ide_usuario, array('class' => 'form-control', 'placeholder'=>'Ingrese el nombre usuario', 'id' =>'usuario')) }}
                @if($errors->has('ide_usuario'))
                <p class="text-danger">{{ $errors->first('ide_usuario') }}</p>
                @endif
            </div>
        </div>

        <!--mensaje del usuario-->
        <div class="form-group">
            <label class="col-sm-2 control-label" for="">Ingrese su mensaje: </label>
            <div class="col-sm-10 ">
                {{ Form::textarea('ale_mensaje', Input::old('ale_mensaje'), array('class' => 'form-control', 'placeholder'=>'Ingrese su mensaje', 'id' =>'ale_mensaje')) }}
                @if($errors->has('ale_mensaje'))
                <p class="text-danger">{{ $errors->first('ale_mensaje') }}</p>
                @endif
            </div>
        </div>

 <!--tipo de alerta-->
       <div class="form-group">
            <label class="col-sm-2 control-label" for="">Seleccione un tipo de Alerta: </label>
            <div class="col-sm-10 ">

             {{Form::select('tipo_id', $combo)}}


            </div>
        </div>

    <div class="col-sm-offset-2 col-sm-10">
        <div class="pull-right">
            <div class="form-group">
            <a class="btn btn-danger" href="{{ URL::to('alertas')}}">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </div>
</div>
</fieldset>
{{Form::close() }}
</div>
@stop
