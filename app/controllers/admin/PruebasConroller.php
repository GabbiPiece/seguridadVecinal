<?php

class PruebasController extends \BaseController {


    public function getIndex()
    {
        
        $this->prueba_enviar();

        echo Gf::ver("gabi");
        
       echo "<br>";
        
      $rows = Usuario::seleccionar_usuario();
    
      
      
      foreach($rows as $var)
      {
          echo $var->usu_zona;
          echo $var->usu_nombre;
          echo "<br>";
          
          
      }
      
      
      $row = DB::select("select * from usuarios where usu_id=1");
      
      echo $row[0]->usu_nombre;


    }
    
    
    private function prueba_enviar()
    {
        echo "estoy probando funciones privadas<br>";
    }
}