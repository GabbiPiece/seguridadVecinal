
<?php

class UserController extends BaseController {

 public function creararticulo()
    {
        return View::make('UserController.creararticulo');
    }


public function verarticulos()
    {
        $conn = DB::connection("mysql");

        if (isset($_GET["buscar"]))
        {
         $buscar = htmlspecialchars(Input::get("buscar"));
         $paginacion = $conn
                 ->table("blog")
                 ->where("titulo", "LIKE", '%'.$buscar.'%')
                 ->orwhere("descripcion", "LIKE", '%'.$buscar.'%')
                 ->whereIn("ide_usuario", array(Auth::user()->get()->ide_usuario))
                 ->orderby("id", "desc")
                 ->paginate(10);
        }
        else
        {
        $paginacion = $conn
                ->table("blog")
                ->whereIn("ide_usuario", array(Auth::user()->get()->ide_usuario))
                ->orderby("id", "desc")
                ->paginate(10);
        }

        return View::make('UserController.verarticulos', array('paginacion' => $paginacion));
    }

public function editararticulo($id)
    {

        $conn = DB::connection("mysql");
        //$sql = "SELECT * FROM blog WHERE id=? AND ide_usuario=?";
        $sql = "SELECT * FROM blog where ide_usuario = $id";
        $fila = $conn->select($sql, array($id, Auth::user()->get()->ide_usuario));

        return View::make('UserController.editararticulo', array('fila' => $fila, 'id' => $id));
    }

public function eliminararticulo($id)
    {

        $conn = DB::connection("mysql");
        $sql = "SELECT id, titulo FROM blog WHERE id=? AND ide_usuario=?";
        $fila = $conn->select($sql, array($id, Auth::user()->get()->ide_usuario));

        return View::make('UserController.eliminararticulo', array('fila' => $fila));
    }
}
