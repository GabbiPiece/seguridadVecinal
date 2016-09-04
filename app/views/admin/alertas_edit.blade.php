@extends ('layouts/admin')

@section ('title') Editar Alerta-Sistema Alerta @stop


@section ('content')
    <div class="col-md-12">
        {{ Form::model($alerta,array('url' => 'alertas/update/'.$alerta->ale_id, 'method' => 'PUT', 'class' => 'form-horizontal'))   }}
        <fieldset>
            <legend>Editar Alerta</legend>



              <!--direccion del usuario-->
            <div class="form-group">
                  <label class="col-sm-2 control-label" for="">Direccion del usuario:</label>
                <div class="col-sm-10 ">
                    {{ Form::text('ale_direccion', Input::old('ale_direccion'), array('class' => 'form-control', 'placeholder'=>'Numero de Calle', 'id' =>'ale_direccion')) }}
                    @if($errors->has('ale_direccion'))
                        <p class="text-danger">{{ $errors->first('ale_direccion') }}</p>
                    @endif
                </div>
            </div>

           <!--barrio del usuario-->
        <div class="form-group">
            <label class="col-sm-2 control-label" for="">Seleccione un Barrio: </label>
            <div class="col-sm-10 ">
              {{Form::select('ale_barrio',['Martin Guemes', 'Salto de las Rosas', 'Real del Padre',' '])}}
            </div>
        </div>

            <!--usuario nombre-->
            <div class="form-group">
                  <label class="col-sm-2 control-label" for="">Name:</label>
                <div class="col-sm-10">
                    {{ Form::text('usuario', Input::old('usuario'), array('class' => 'form-control', 'disabled'=>'Nombre de usuario', 'id' =>'usuario')) }}
                    @if($errors->has('usuario'))
                        <p class="text-danger">{{ $errors->first('usuario') }}</p>
                    @endif
                </div>
            </div>


            <!--mensaje del usuario-->
            <div class="form-group">
                  <label class="col-sm-2 control-label" for="">Mensaje:</label>
                <div class="col-sm-10 ">
                    {{ Form::text('ale_mensaje', Input::old('ale_mensaje'), array('class' => 'form-control', 'placeholder'=>'Mensaje', 'id' =>'ale_mensaje')) }}
                    @if($errors->has('ale_mensaje'))
                        <p class="text-danger">{{ $errors->first('ale_mensaje') }}</p>
                    @endif
                </div>
            </div>

           <!--tipo de alerta-->
       <div class="form-group">
            <label class="col-sm-2 control-label" for="">Seleccione un tipo de Alerta: </label>
            <div class="col-sm-10 ">
               {{Form::select('tipo_id',['Seguridad', 'Medica', 'Otra',''])}} 


            </div>
        </div>

</div>
          <!--botones-->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a class="btn btn-danger" href="{{ URL::to('alertas')}}">Cancelar</a>
                    </div>
                </div>
            </div>

        </fieldset>
        {{Form::close() }}
    </div>

@stop
