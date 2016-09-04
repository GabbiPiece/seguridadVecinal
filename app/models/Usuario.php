<?php


class Usuario extends Eloquent{

    protected $table = 'usuarios';
    protected $primaryKey = 'usu_id';
    public $timestamps = false;
    
    
    public static function seleccionar_usuario()
    {
        return DB::select("select * from usuarios");
    }


}
