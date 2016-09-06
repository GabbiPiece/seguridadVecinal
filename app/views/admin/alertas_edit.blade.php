@extends ('layouts/admin')

@section ('title') Editar Alerta-Sistema Alerta @stop
@section ('content')

    <div class="col-md-12">
        {{ Form::model($alerta,array('url' => 'alertas/update/'.$alerta->id, 'method' => 'PUT', 'class' => 'form-horizontal'))   }}
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

             <div class="form-group">
                 <label class="col-sm-2 control-label" for="">Seleccione un Barrio: </label>
                 <div class="col-sm-10 ">
                {{Form::select('zona_id', $combobox, Auth::user()->get()->zona_id)}}
                 </div>
             </div>

            <!--tipo de alerta-->
            <div class="form-group">
                 <label class="col-sm-2 control-label" for="">Seleccione un tipo de Alerta: </label>
                 <div class="col-sm-10 ">
                   {{Form::select('tipo_id', $combo)}}
                 </div>
             </div>
                   <!--usuario nombre-->
              <div class="form-group">
                           <label class="col-sm-2 control-label" for=""></label>
                           <div class="col-sm-10 ">
                               {{ Form::hidden('usuario', Auth::user()->get()->nombre, array('class' => 'form-control', 'placeholder'=>'Ingrese el nombre usuario', 'id' =>'usuario')) }}
                               @if($errors->has('usuario'))
                               <p class="text-danger">{{ $errors->first('usuario') }}</p>
                               @endif
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
@stop
