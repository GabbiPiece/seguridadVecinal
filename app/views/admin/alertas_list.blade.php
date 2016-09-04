@extends ('layouts/admin')
@section ('title') Listado de Alerta-Sistema Alerta@stop
@section ('content') 
<div class="row ">
    <div class="col-lg-3 pull-right">
        <div class="form-group">
        <div class="input-group custom-search-form ">  
            
            {{ Form::open(array('url' => 'alertas/find/','method' => 'get', 'title' => 'Buscar Alerta')) }}
            <input type="text" id="ale_valor" name="ale_valor" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
            {{ Form::close() }}
        </div><!-- /input-group -->        
        </div>
    </div>
    
    <div class="col-lg-3 pull-left">
        <span><a class="btn btn-success" href="{{ URL('/alertas/create' ) }}" >Crear Alerta</a></span>
    </div>
</div>
<div class="table-responsive">
<table class="table table-striped">
    <tr>
        <th>N°</th>
        <th>Dirección</th>
        <th>Barrio</th>
        <th>Usuario</th>
        <th>Mensaje</th>
        <th>Tipo</th>
        
      
 <th>Acciones</th>
    </tr>

    @foreach ($alerta as $var)
    <tr>
        <td>{{ $var->ale_id }}</td>
        <td>{{ $var->ale_direccion }}</td>
        <td>{{ $var->zona_barrio }}</td>
        <td>{{ $var->usuario }}</td>
        <td>{{ $var->ale_mensaje }}</td>
        <td>{{ $var->ale_tipo }}</td>
       
   
        <td>
            <a class='btn  btn-info glyphicon glyphicon-edit' title='Editar Alerta' href="{{ URL::to('/alertas/edit', $var->ale_id ) }}"></a>
            {{ Form::open(array('url' => 'alertas/destroy/' . $var->ale_id,'method' => 'delete', 'class' => 'pull-right', 'title' => 'Eliminar Alerta')) }}
            <button class="glyphicon glyphicon-trash btn btn-danger"></button>
            {{ Form::close() }}

        </td>
    </tr>
    @endforeach
</table> 
</div>
{{ $alerta->links() }} 
@stop
