<?php


class Tipo extends Eloquent{

    protected $table = 'tipo_alerta';
    protected $primaryKey = 'tipo_id';
    //laravel trabaja con dos campos
    /* create_at y udpdate_at/**/

    public $timestamps = false;

   
  
    
}
