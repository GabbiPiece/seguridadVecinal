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
        <th>Mensaje</th>
        <th>Barrio</th>
        <th>Tipo</th>
        <th>Usuario</th>


 <th>Acciones</th>
    </tr>

    @foreach ($alerta as $alertas)
    <tr>
        <td>{{ $alertas->id }}</td>
        <td>{{ $alertas->ale_direccion }}</td>
        <td>{{ $alertas->ale_mensaje }}</td>
        <td>{{ $alertas->zona_id }}</td>
        <td>{{ $alertas->tipo_id }}</td>
        <td>{{ $alertas->usuario }}</td>


        <td>
            <a href="{{URL::to('alertas/edit', $alertas->id)}}" class="btn btn-primary">Editar</a>           

            {{ Form::open(array('url' => 'alertas/destroy/' . $alertas->id,'method' => 'delete', 'class' => 'pull-right', 'title' => 'Eliminar Alerta')) }}
            <button class="glyphicon glyphicon-trash btn btn-danger"></button>
            {{ Form::close() }}

        </td>
    </tr>
    @endforeach
</table>
</div>
{{ $alerta->links() }}
@stop
