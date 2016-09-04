<?php


class Alerta extends Eloquent{

    protected $table = 'alerta';
    //protected $primaryKey = 'ale_id';
    //laravel trabaja con dos campos
    /* create_at y udpdate_at/**/
    public static function getAlerta(){
      return DB::select("SELECT * FROM alerta");
    }
    public $timestamps = false;

}
