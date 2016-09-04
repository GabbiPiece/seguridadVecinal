<?php
class HomeController extends \BaseController {

public function showWelcome()
	{

		return View::make('admin.index');
	}

public function blog()
	{
		$conn = DB::connection("mysql");
		if (isset($_GET["buscar"])){
			$buscar= htmlspecialchars(Input::get("buscar"));
			$paginacion = $conn
						->table("blog")
						->where("titulo", "LIKE", '%' .$buscar. '%')
						->orwhere("descripcion", "LIKE", '%' .$buscar. '%')
						->paginate(4);
		}
		else
		{

		$paginacion = $conn->table("blog")->paginate(2);
		}
		return View::make('HomeController.blog',array("paginacion" => $paginacion));
	}

public function condiciones()
{
	return View::make('HomeController.condiciones');
}
public function contacto()
{

	$mensaje = null;
	if (isset($_POST['contacto'])){
		$data = array(

			'name' => Input::get('name'),
			'email' => Input::get('email'),
			'subject' => Input::get('subject'),
			'msg' => Input::get('msg')
			);
		 $fromEmail = 'gabi.carp26@gmail.com';
         $fromName = 'Administrador';

      Mail::send('emails.contacto', $data, function($message) use ($fromName, $fromEmail)
      {
      	$message->to($fromEmail, $fromName);
      	$message->from($fromEmail, $fromName);
      	$message->subject('Nuevo mensaje de contacto');

      });

      $mensaje = '<div class="text-info"> Mensjaje enviado con exito</div>';

	}
	return View::make('HomeController.contacto', array('mensaje' => $mensaje));
}
public function login()
{
	return View::make('HomeController.login');
}
public function privado()
{
	return View::make('HomeController.privado');

}

public function salir()
{
	Auth::user()->logout();
	return Redirect::to('login');
}

public function register()
{
					$tipos = Zona::all()->lists('zona_barrio','zona_id');


					$combobox = array(0=> "Seleccione un barrio") + $tipos;

					return View::make('HomeController.register',compact('combobox'));
        }

/*public function barrio_option()
			  {
					$tipos = Zona::all()->lists('zona_id','zona_id');
					var_dump(	$tipos);
					$combobox = array(0=> "Seleccione un barrio") + $tipos;

					echo "string";



					return View::make('HomeController.register', array('combobox'=>$combobox));
			  }*/

public function confirmregister()
        {

        }


public function recoverpassword()
        {
            return View::make('HomeController.recoverpassword');
        }

public function resetpassword($type, $token)
        {
            return View::make('HomeController.resetpassword')->with('token', $token);
        }

public function updatepassword()
        {

        }
public function articulo($id)
        {
            $conn = DB::connection("mysql");
            $sql = "SELECT * FROM blog WHERE id=?";
            $fila = $conn->select($sql, array($id));
            return View::make('HomeController.articulo', array('fila' => $fila));
        }

public function editarusuario()
        {
            return View::make('HomeController.editarusuario');
        }

}
