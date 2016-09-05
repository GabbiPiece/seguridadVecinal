<?php
use Illuminate\Support\Facades\Paginator;


class Alerta extends Eloquent{

    protected $table = 'alerta';
    public static function getAlertaBarrio(){
      $query = DB::select("SELECT * FROM alerta
        INNER JOIN zona ON alerta.zona_id = zona.zona_id
        INNER JOIN tipo_alerta ON alerta.tipo_id = tipo_alerta.tipo_id");
      $paginate = Paginator::make($query, count($query), 5);
      return $paginate;
    }
    public $timestamps = false;

}
