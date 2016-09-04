@extends ('layouts/admin')

@section ('title') Editar Usuario-Sistema Alerta @stop


@section ('content')
    <div class="col-md-12">
        {{ Form::model($usuario,array('url' => 'usuarios/update/'.$usuario->usu_id, 'method' => 'PUT', 'class' => 'form-horizontal'))   }}
        <fieldset>
            <legend>Editar Usuario</legend>
            
            <!--Nombre del usuario-->
            <div class="form-group">
                  <label class="col-sm-2 control-label" for="">Nombre:</label>
                <div class="col-sm-10 ">
                    {{ Form::text('usu_nombre', Input::old('usu_nombre'), array('class' => 'form-control', 'placeholder'=>'Nombre', 'id' =>'usu_nombre')) }}
                    @if($errors->has('usu_nombre'))
                        <p class="text-danger">{{ $errors->first('usu_nombre') }}</p>
                    @endif
                </div>
            </div>
            
            
             <!--Apellido del usuario-->
            <div class="form-group">
                  <label class="col-sm-2 control-label" for="">Apellido:</label>
                <div class="col-sm-10 ">
                    {{ Form::text('usu_apellido', Input::old('usu_apellido'), array('class' => 'form-control', 'placeholder'=>'Apellido', 'id' =>'usu_apellido')) }}
                    @if($errors->has('usu_apellido'))
                        <p class="text-danger">{{ $errors->first('usu_apellido') }}</p>
                    @endif
                </div>
            </div>
         <!--Celular de usuario-->
        <div class="form-group">
                  <label class="col-sm-2 control-label" for="">Celular:</label>
                <div class="col-sm-10 ">
                    {{ Form::text('usu_celular', Input::old('usu_celular'), array('class' => 'form-control', 'placeholder'=>'Celular', 'id' =>'usu_celular')) }}
                    @if($errors->has('usu_celular'))
                        <p class="text-danger">{{ $errors->first('usu_celular') }}</p>
                    @endif
                </div>
            </div>
        
        <!--Zona del usuario-->
        <div class="form-group">
        <label class="col-sm-2 control-label" for="">Ingrese el barrio/zona donde vive: </label>
        <div class="col-sm-10 ">
            {{ Form::text('usu_zona', Input::old('usu_zona'), array('class' => 'form-control', 'placeholder'=>'Ingrese el barrio/zona donde vive', 'id' =>'usu_zona')) }}
            @if($errors->has('usu_zona'))
            <p class="text-danger">{{ $errors->first('usu_zona') }}</p>
            @endif
        </div></div>
        
          <!--Nombre de User del usuario-->
       <div class="form-group">
        <label class="col-sm-2 control-label" for="">Nombre de usuario: </label>
        <div class="col-sm-10 ">
            {{ Form::text('usu_username', Input::old('usu_username'), array('class' => 'form-control', 'placeholder'=>'Nombre de usuario', 'id' =>'usu_username')) }}
            @if($errors->has('usu_username'))
            <p class="text-danger">{{ $errors->first('usu_username') }}</p>
            @endif
        </div></div>

        
              <!--Clave del usuario-->
        <div class="form-group">
        <label class="col-sm-2 control-label" for="">Clave: </label>
        <div class="col-sm-10 ">
            {{ Form::password('usu_clave', Input::old('usu_clave'), array('class' => 'form-control', 'placeholder'=>'Clave', 'id' =>'usu_clave')) }}
            @if($errors->has('usu_clave'))
            <p class="text-danger">{{ $errors->first('usu_clave') }}</p>
            @endif
        </div></div>
        
         <!--Email del usuario-->
       <div class="form-group">
        <label class="col-sm-2 control-label" for="">Email: </label>
        <div class="col-sm-10 ">
            {{ Form::text('usu_email', Input::old('usu_email'), array('class' => 'form-control', 'placeholder'=>'Email', 'id' =>'usu_email')) }}
            @if($errors->has('usu_email'))
            <p class="text-danger">{{ $errors->first('usu_email') }}</p>
            @endif
        </div></div> 
</div> 
             

            <!--botones-->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a class="btn btn-danger" href="{{ URL::to('usuarios')}}">Cancelar</a>
                    </div>
                </div>
            </div>

        </fieldset>
        {{Form::close() }}
    </div>

@stop

