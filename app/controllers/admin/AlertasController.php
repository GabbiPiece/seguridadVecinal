<?php

class AlertasController extends \BaseController {

  //aca hacemos el metodo para listar alertas
  public function getlist() {
    $alertas = Alerta::getAlertaBarrio();
    $data = [
      'alerta' => $alertas,
    ];
    return View::make('admin/alertas_list', $data);
  }

  //para crear alerta
  public function getcreate() {
    return View::make('admin/alertas_create');
  }
  //para insertar valores a la db usuarios
  public function poststore() {
    $enviar_msj = new Smsc();
    $rules = array(
      'ale_direccion' => 'required:alerta,ale_direccion',
      'zona_id' => 'required:zonas,zona_id',
      'ale_mensaje' => 'required:alerta,ale_mensaje',
      'tipo_id' => 'required:alerta,tipo_id',
      'ide_usuario' => 'required:alerta,ide_usuario',

    );

    $attributes = array(
      'ale_direccion' => 'ale_direccion',
      'zona_id' =>'barrio',
      'ale_mensaje' => 'mensaje',
      'tipo_id' => 'tipo',
      'ide_usuario' =>'ide_usuario',

    );
    $validator = Validator::make(Input::all(), $rules);
    $validator->setAttributeNames($attributes);
    // process the login
    if ($validator->fails()) {
      return Redirect::to('alertas/create')
      ->withErrors($validator)->withInput(Input::all());
    }

    $alertas = new Alerta();
    $alertas->ale_direccion = Input::get('ale_direccion');
    $alertas->zona_id = Input::get('zona_id');
    $alertas->ale_mensaje = Input::get('ale_mensaje');
    $alertas->tipo_id = Input::get('tipo_id');
    $alertas->ide_usuario = Input::get('ide_usuario');
    $alertas->save();

    try {

        $user = 'Seguridad_Vecinal';
        $apikey = '8bc2acecc5065a1fd6ef7ec4dea517f6';
        $smsc = new Smsc($user, $apikey);
        // Estado del servicio
        echo 'El estado del servicio es ' . ($smsc->getEstado() ? 'OK' : 'CAIDO') . '. ';
        // Saldo
        echo 'Quedan: ' . $smsc->getSaldo() . ' sms. ';
        $rows = DB::select("SELECT DISTINCT (usuario.celular) FROM "."usuario
        INNER JOIN alerta ON usuario.zona_id=alerta.zona_id "."WHERE usuario.zona_id = $alertas->zona_id");
        foreach($rows as $var)
        {
          $smsc->addNumero($var->celular);
          $smsc->setMensaje('Seguridad Vecinal: Desde:'.Input::get('ale_direccion').''.Input::get("  ").'Mensaje:'.Input::get('ale_mensaje'));
        }
        if ($smsc->enviar())
          echo 'Mensaje enviado.';
          $alertas->save();
          Session::flash('message','La alerta ha sido enviada!');
          return Redirect::to('alertas');
    }catch (Exception $e) {
      echo 'Error ' . $e->getCode() . ': ' . $e->getMessage();
    }
  }

  public function getedit($id) {
    $alertas = Alerta::find($id);
    $data = [
      'alerta' => $alertas,
    ];

    return View::make('admin/alertas_edit',$data);
  }

  public function putUpdate($id) {

    $rules = array(
      'ale_direccion' => 'required:alerta,ale_direccion',
      'ale_mensaje' => 'required:alerta,ale_mensaje',
      'zona_id' => 'required:zonas,zona_id',
      'tipo_id' => 'required:alerta,tipo_id',
      'ide_usuario',

    );

    $attributes = array(
      'ale_direccion' =>'direccion',
      'ale_mensaje' => 'mensaje',
      'zona_id' =>'barrio',
      'tipo_id' => 'tipo',
      'ide_usuario' => 'ide_usuario',
    );

    $validator = Validator::make(Input::all(), $rules);
    $validator->setAttributeNames($attributes);
    $alertas = Alerta::find($id);
    $alertas->ale_direccion = Input::get('ale_direccion');
    $alertas->ale_mensaje = Input::get('ale_mensaje');
    $alertas->zona_id = Input::get('zona_id');
    $alertas->tipo_id = Input::get('tipo_id');
    $alertas->ide_usuario = Input::get('ide_usuario');
    //actualizad base de dato
    $alertas->save();
    //Se envia un mensaje de tipo flash solo se muestra una vez redireccionado
    //en el caso de actualizar la pagina desaparece
    Session::flash('message', 'La alerta se actualizo correctamente');
    //Si todos se cumplio correctamente redirecciona
    return Redirect::to('alertas');

  }

  public function deleteDestroy($id) {
    //Se crea una instalncia del objeto con el id
    //y se elimina
    $alertas = Alerta::find($id);
    $alertas->delete();
    //Se envia un mensaje de tipo flash solo se muestra una vez redireccionado
    //en el caso de actualizar la pagina desaparece
    Session::flash('message','La alerta se elimino correctamente' );
    //Si todos se cumplio correctamente redirecciona
    return Redirect::to('alertas');

  }

  public function barrio_option()
  {
    $tipos = Zona::all()->lists('zona_barrio','zona_id');
    // $tipos = DB::select('select distinct ale_barrio from alerta')->lists('ale_barrio','ale_id');
    $combobox = array(0=> "Seleccione un barrio") + $tipos;
    $alerta=  Tipo::all()->lists('ale_tipo','tipo_id');
    // $tipos = DB::select('select distinct ale_barrio from alerta')->lists('ale_barrio','ale_id');
    $combo = array(0=> "Seleccione un tipo") + $alerta;
    return View::make('admin/alertas_create', compact('combobox','combo'));

  }
  public function barrio_option2()
  {
    $tipos = Zona::all()->lists('zona_barrio','zona_id');
    // $tipos = DB::select('select distinct ale_barrio from alerta')->lists('ale_barrio','ale_id');
    $combobox = array(0=> "Seleccione un barrio") + $tipos;
    $alerta=  Tipo::all()->lists('ale_tipo','tipo_id');
    // $tipos = DB::select('select distinct ale_barrio from alerta')->lists('ale_barrio','ale_id');
    $combo = array(0=> "Seleccione un tipo") + $alerta;
    return View::make('admin.alertas_edit', compact('combobox','combo'));
  }

}
