<?php
    /*funciones basicas para enviar mensajes*/

        include("conexion.php");
    //Codigo para el ultimo id
        $string="";
        //ultimo regisro
        $query=mysqli_query($con,"SELECT usu_zona FROM alerta WHERE ale_id = (SELECT MAX(ale_id) FROM alerta)");
        $toarray=mysqli_fetch_assoc($query);
        $string=implode($toarray);
        //echo $string;
        //$string=implode($resultado);

       //$string=$query;

       //Codigo de  barrio a compararar
       $b="Martin Guemez";
       $c="Salto de las Rosas";
       $d="Real del padre";





?>
