<?php
Route::get('/', function()
{
	return View::make('admin.index');
});
Route::get('alertas', 'AlertasController@getList');
//Route::get('alertas/create', 'AlertasController@getCreate');
Route::get('alertas/create', 'AlertasController@getCreate');
Route::get('alertas/create', 'AlertasController@barrio_option');
//Route::get('alertas/create', 'AlertasController@alerta_option');
Route::post('alertas/store', 'AlertasController@postStore');
Route::get('alertas/edit/{id}', 'AlertasController@getEdit');
Route::put('alertas/update/{id}', 'AlertasController@putUpdate');
Route::delete('alertas/destroy/{id}', 'AlertasController@deleteDestroy');
Route::get('/editarusuario', 'HomeController@editarusuario', function (){});
Route::get('/condiciones', 'HomeController@condiciones', function (){});
Route::get('/contacto', 'HomeController@contacto', function (){
        return View::make('HomeController.contacto');
});
//ruta para blog
Route::get('/blog', 'HomeController@blog', function (){});
Route::get('/login', 'HomeController@login', function (){});
Route::get('/privado', 'HomeController@privado', function (){});
Route::get('/salir', 'HomeController@salir', function (){});
Route::get('/register', 'HomeController@register');
Route::get('/confirmregister/{email}/{key}', function($email, $key){
    if (urldecode($email) == Cookie::get("email") && urldecode($key) == Cookie::get("key"))
    {
        $conn = DB::connection("mysql");
        $sql = "UPDATE usuario SET active=1 WHERE email=?";
        $conn->update($sql, array($email));
        $message = "<hr><label class='label label-success'>Tu registro se ha llevado a cabo con éxito.</label><hr>";
        return Redirect::route("login")->with("message", $message);
    }
    else
    {
        return Redirect::route("register");
    }
});
//articulos
Route::get('/articulo/{id}', 'HomeController@articulo', function(){});
Route::get('/verarticulos', 'UserController@verarticulos', function(){});
Route::get('/editararticulo/{id}', 'UserController@editararticulo', function(){});
Route::any('/editararticulo/{id}', array('as' => 'editararticulo', 'uses' => 'UserController@editararticulo'))->before("auth_user");
Route::post('/editararticulo/{id}', array('before' => 'csrf', function(){
    $rules = array(
        "titulo" => "required|regex:/^[a-z0-9áéóóúàèìòùäëïöüñ\s]+$/i|min:3|max:100",
        "descripcion" => "required|min:10|max:1000000000000000000000",
    );
    $messages = array(
        "titulo.required" => "El campo Título es requerido",
        "titulo.regex" => "Tan sólo se aceptan letras y números",
        "titulo.min" => "El mínimo permitido son 3 caracteres",
        "titulo.max" => "El máximo permitido son 100 caracteres",
        "descripcion.required" => "El campo Descripción es requerido",
        "descripcion.min" => "El mínimo permitido son 10 caracteres",
        "descripcion.max" => "El máximo permitido son 1000 caracteres",
        );
    $validator = Validator::make(Input::All(), $rules, $messages);
    if ($validator->passes())
    {
        /* Obtenemos el id del usuario autenticado */
        $id = Auth::user()->get()->ide_usuario;
        /* Si el usuario está autenticado */
        if(!empty($id))
        {
            /* Obtenemos los valores de los campos del formulario */
            $id = Input::get('id');
            $titulo = Input::get('titulo');
            $descripcion = htmlspecialchars(Input::get('descripcion'));
            $src = $_FILES['src'];
            $href = Input::get('href');
            /* Establecemos la conexion a la DB */
            $conn = DB::connection("mysql");
            /** Si se ha seleccionado una nueva imagen guardamos la nueva imagen
               y eliminamos la anterior **/
            if ($src["size"] > 0)
            {
            $ruta_imagen = "directorio/images/";
            $imagen = rand(1000, 9999)."-".$src["name"];
            move_uploaded_file($src["tmp_name"], $ruta_imagen.$imagen);
            /* Hacemos la consulta para obtener el src de la imagen anterior */
            $sql = "SELECT src FROM blog WHERE id=? AND ide_usuario=?";
            $anterior_imagen = $conn->select($sql, array($id, $id));
            $anterior_imagen = $anterior_imagen[0]->src;
            /* Eliminamos la imagen si existe */
                if (is_file($anterior_imagen))
                {
                    unlink($anterior_imagen);
                }
            }
            /* Si se ha seleccionado una nueva imagen, amoldamos la consulta para
             * guardar también el src de la nueva imagen
             */
            if ($src["size"] > 0)
            {
            $sql = "UPDATE blog SET titulo='$titulo', descripcion='$descripcion', src='".$ruta_imagen.$imagen."', href='$href' WHERE id=? AND ide_usuario=?";
            $conn->update($sql, array($id, $id));
            }
            else /* De lo contrario sólo actualizamos titulo, descripcion y href */
            {
            $sql = "UPDATE blog SET titulo='$titulo', descripcion='$descripcion', href='$href' WHERE id=? AND ide_usuario=?";
            $conn->update($sql, array($id, $id));
            }
            $message = "<hr><label class='label label-info'>Editado con éxito</label><hr>";
            return Redirect::back()->with("message", $message);
        }
    }
    else
    {
        return Redirect::back()->withInput()->withErrors($validator);
    }
}));
Route::any('/eliminararticulo/{id}', array('as' => 'eliminararticulo', 'uses' => 'UserController@eliminararticulo'))->before("auth_user");
Route::get('/eliminararticulo/{id}', 'UserController@eliminararticulo', function(){});
Route::post('/eliminararticulo/{id}', array('before' => 'csrf', function(){
    $id = Auth::user()->get()->ide_usuario;
    if (!empty($id))
    {
        $id = Input::get('id');
        $conn = DB::connection('mysql');
        $sql = "DELETE FROM blog WHERE id=? AND ide_usuario=?";
        $conn->delete($sql, array($id, $id));
        $message = "<hr><label class='label label-info'>Enhorabuena artículo con id $id eliminado con éxito</label><hr>";
        return Redirect::route("verarticulos")->with('message', $message);
    }
    else
    {
        $message = "<hr><label class='label label-danger'>Ha ocurrido un error al intentar eliminar el artículo con id $id</label><hr>";
        return Redirect::route("verarticulos")->with('message', $message);
    }
}));
Route::get('/recoverpassword', 'HomeController@recoverpassword', function(){
    return View::make('HomeController.recoverpassword');
});
Route::get('/resetpassword/{type}/{token}', 'HomeController@resetpassword', function(){
    return View::make("HomeController.resetpassword");
});
Route::get('/updatepassword', 'HomeController@updatepassword', function(){});
Route::any('/contacto', array('as'=> 'contacto', 'uses' => 'HomeController@contacto'));
Route::any('/hello', array('as'=> 'hello', 'uses' => 'HomeController@hello'));
Route::any('/blog', array('as'=> 'blog', 'uses' => 'HomeController@blog'))->before("auth_user");;
Route::any('/login', array('as'=> 'login', 'uses' => 'HomeController@login'))->before("guest_user");
Route::any('/privado', array('as'=> 'privado', 'uses' => 'HomeController@privado'))->before("auth_user");;
Route::any('/salir', array('as'=> 'salir', 'uses' => 'HomeController@salir'))->before("auth_user");
//Route::any('admin/alertas', array('as'=> 'admin/alartas', 'uses' => 'AlertasController@alertas'))->before("auth_user");
Route::any('/register', array('as'=> 'register', 'uses' => 'HomeController@register'));
Route::any('/confirmregister', array('as'=> 'confirmregister', 'uses' => 'HomeController@confirmregister'));
Route::any('/articulo/{id}', array('as' => 'articulo', 'uses' => 'HomeController@articulo'));
Route::any('/verarticulos', array('as' => 'verarticulos', 'uses' => 'UserController@verarticulos'))->before("auth_user");
Route::any('/crear', array('as' => 'crear', 'uses' => 'UserController@crear'))->before("auth_user");
Route::any('admin/alertas', array('as'=> 'alertas', 'uses' => 'AlertasController@alertas'))->before("auth_user");
Route::any('/recoverpassword', array('as' => 'recoverpassword', 'uses' => 'HomeController@recoverpassword'))->before("guest_user");
Route::any('/resetpassword/{type}/{token}', array('as' => 'resetpassword', 'uses' => 'HomeController@resetpassword'))->before("guest_user");
Route::any('/updatepassword', array('as' => 'updatepassword', 'uses' => 'HomeController@updatepassword'))->before("guest_user");
App::missing(function($excepcion){
    return Response::View('error.error404', array() , 404 );
});
Route::post('/login' , array('before' => 'csrf', function(){
        $usuario = array(
            //'celular' => Input::get('celular'),
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'active' => 1,
            );
        $remember = Input::get("remember");
        $remember == 'On' ? $remember = true : $remember = false;
        if (Auth::user()->attempt($usuario, $remember)){
            return Redirect::route("privado");
        }
        else
        {
            return Redirect::route("login");
        }
}));
Route::get('/register', 'HomeController@register', function()
{
	return View::make('HomeController.register');
});
Route::get('/confirmregister/{email}/{key}', function($email, $key){
    if (urldecode($email) == Cookie::get("email") && urldecode($key) == Cookie::get("key"))
    {
        $conn = DB::connection("mysql");
        $sql = "UPDATE usuario SET active=1 WHERE email=?";
        $conn->update($sql, array($email));
        $message = "<hr><label class='label label-success'>Enhorabuena tu registro se ha llevado a cabo con éxito.</label><hr>";
        return Redirect::route("login")->with("message", $message);
    }
    else
    {
      return Redirect::route("register");
    }
});
Route::get('/creararticulo', 'UserController@creararticulo', function()
{
    return View::make('HomeController.creararticulo');
});
Route::any('/creararticulo', array('as' => 'creararticulo', 'uses' => 'UserController@creararticulo'))->before("auth_user");
Route::post('/creararticulo', array('before' => 'csrf', function(){
    $rules = array(
        "titulo" => "required|regex:/^[a-z0-9áéóóúàèìòùäëïöüñ\s]+$/i|min:3|max:100",
        "descripcion" => "required|min:10|max:1000000000000000000000000000000",
    );
    $messages = array(
        "titulo.required" => "El campo Título es requerido",
        "titulo.regex" => "Tan sólo se aceptan letras y números",
        "titulo.min" => "El mínimo permitido son 3 caracteres",
        "titulo.max" => "El máximo permitido son 100 caracteres",
        "descripcion.required" => "El campo Descripción es requerido",
        "descripcion.min" => "El mínimo permitido son 10 caracteres",
        "descripcion.max" => "El máximo permitido son 1000 caracteres",
    );
    $validator = Validator::make(Input::All(), $rules, $messages);
    if ($validator->passes())
    {
        $id = Auth::user()->get()->ide_usuario;
        if(!empty($id))
        {
            $titulo = Input::get('titulo');
            $descripcion = htmlspecialchars(Input::get('descripcion'));
            $src = $_FILES['src'];
            $href = Input::get('href');
            $ruta_imagen = "directorio/images/";
            $imagen = rand(1000, 9999)."-".$src["name"];
            move_uploaded_file($src["tmp_name"], $ruta_imagen.$imagen);
            $conn = DB::connection("mysql");
            $sql = "INSERT INTO blog (titulo, descripcion, src, href, ide_usuario) VALUES (?, ?, ?, ?, ?)";
            $conn->insert($sql, array($titulo, $descripcion, $ruta_imagen.$imagen, $href, $id));
            $message = "<hr><label class='label label-info'>Enhorabuena artículo creado con éxito</label><hr>";
            return Redirect::back()->with("message", $message);
        }
    }
    else
    {
        return Redirect::back()->withInput()->withErrors($validator);
    }
}));
Route::any('/register', array('as' => 'register', 'uses' => 'HomeController@register'));
Route::any('/confirmregister', array('as' => 'confirmregister', 'uses' => 'HomeController@confirmregister'));
Route::post('/register', array('before' => 'csrf', function(){
    $rules = array
    (
    'usuario' => 'required|regex:/^[a-záéóóúàèìòùäëïöüñ\s]+$/i|min:3|max:50',
    'email' => 'required|email|unique:usuario|between:3,80',
    'password' => 'required|regex:/^[a-z0-9]+$/i|min:8|max:16',
    'repetir_password' => 'required|same:password',
    'terminos' => 'required',
    'direccion' => 'required',
    'celular' => 'required|numeric',
    );
    $messages = array
    (
        'usuario.required' => 'El nombre de usuario es requerido',
        'usuario.regex' => 'Sólo se aceptan letras',
        'usuario.min' => 'El mínimo permitido son 3 caracteres',
        'usuario.max' => 'El máximo permitido son 50 caracteres',
        'email.required' => 'El campo email es requerido',
        'email.email' => 'El formato de email es incorrecto',
        'email.unique' => 'El email ya se encuentra registrado',
        'email.between' => 'El email debe contener entre 3 y 80 caracteres',
        'password.required' => 'El campo password es requerido',
        'password.regex' => 'El campo password sólo acepta letras y números',
        'password.min' => 'El mínimo permitido son 8 caracteres',
        'password.max' => 'El máximo permitido son 16 caracteres',
        'repetir_password.required' => 'Debe repetir la contraseña',
        'repetir_password.same' => 'Las contraseñas no coinciden',
        'terminos.required' => 'Tienes que aceptar los términos',
        'direccion.required' => 'La direccion es requerida',
        'direccion.numeric' => 'Debe tener numeros su direccion',
        'celular.required' => 'El celular es requerido',
        'celular.numeric' => 'El celular debe ser numerico',
    );
    $validator = Validator::make(Input::All(), $rules, $messages);
    if ($validator->passes())
    {
        //Guardar los datos en la tabla
        $nombre = input::get('nombre');
        $apellido = input::get('apellido');
        $celular = input::get('celular');
        $direccion = input::get('direccion');
        $zona_id = input::get('zona_id');
        $usuario = input::get('usuario');
        $email = input::get('email');
        $password = Hash::make(input::get('password'));
        $conn = DB::connection('mysql');
        $sql = "INSERT INTO usuario(nombre, apellido, celular, direccion, zona_id, usuario, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $conn->insert($sql, array($nombre, $apellido, $celular, $direccion, $zona_id, $usuario, $email, $password));
        // Crear cookies para luego verificar el link de registro
        // String alfanumérico de 32 caracteres de longitud
        $key = Str::random(32);
        Cookie::queue('key', $key, 60*24);
        // Almacenar el email
        Cookie::queue('email', $email, 60*24);
        // Crear la url de confirmación para el mensaje del email
        $msg = "<a href='".URL::to("/confirmregister/$email/$key")."'>Confirmar cuenta</a>";
        //Enviar email para confirmar el registro
        $data = array(
            'nombre' => $nombre,
            'msg' => $msg,
          );
         $fromEmail = 'gabi.carp26@gmail.com';
         $fromName = 'Administrador del Sistema';
          Mail::send('emails.register', $data, function($message) use ($fromName, $fromEmail, $nombre, $email)
          {
             $message->to($email, $nombre);
             $message->from($fromEmail, $fromName);
             $message->subject('Confirmar registro en el sistema');
          });
          $message = '<hr><label class="label label-info">'.$nombre.' le hemos enviado un email a su cuenta de correo electrónico para que confirme su registro</label><hr>';
          return Redirect::route('register')->with("message", $message);
    }
    else
    {
        return Redirect::back()->withInput()->withErrors($validator);
    }
}));
Route::post('/login', array('before' => 'csrf', function(){
               $user = array(
                    'email' => Input::get('email'),
                    'password' => Input::get('password'),
                    'active' => 1,
                );
                $remember = Input::get("remember");
                $remember == 'On' ? $remember = true : $remember = false;
                if (Auth::user()->attempt($user, $remember))
                {
                    return Redirect::route("privado");
                }
                else
                {
                    Session::flash('message','<div class="alert alert-danger">
                            <strong>Usuario o Contraseña incorrectos</strong>
                            </div>');
                    return Redirect::route("login");
                }
}));
Route::post('/recoverpassword', array('before' => 'csrf', function(){
    $rules = array(
        "email" => "required|email|exists:usuario",
    );
    $messages = array(
        "email.required" => "El campo email es requerido",
        "email.email" => "El formato de email es incorrecto",
        "email.exists" => "El email seleccionado no se encuentra registrado",
    );
    $validator = Validator::make(Input::All(), $rules, $messages);
    if ($validator->passes())
    {
        Password::user()->remind(Input::only("email"), function($message) {
        $message->subject('Recuperar contraseña');
        });
        $message = '<hr><label class="label label-info">Le hemos enviado un email a su cuenta de correo electrónico para que pueda recuperar su contraseña</label><hr>';
        return Redirect::route('recoverpassword')->with("message", $message);
    }
    else
    {
        return Redirect::back()->withInput()->withErrors($validator);
    }
}));
Route::post('/updatepassword', array('before' => 'csrf', function(){
            $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'password_confirmation' => Input::get('repetir_password'),
            'token' => Input::get('token'),
                );
            Password::user()->reset($credentials, function($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
            });
            $message = '<hr><label class="label label-info">Su contraseña cambiado con éxito, ya puedes iniciar sesión</label><hr>';
            return Redirect::to('login')->with('message', $message);
}));
App::missing(function($excepcion){
    return Response::View('error.error404', array() , 404 );
});
