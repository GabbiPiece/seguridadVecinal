<?php
use Illuminate\Support\Facades\Paginator;


class Blog extends Eloquent{

    protected $table = 'blog';
    public static function getBlog(){

      $lista = DB::select("SELECT * FROM blog
      WHERE ide_usuario = 'array(Auth::'user()->get()->id')'");
      $paginate = Paginator::make($lista, count($lista), 5);
      return $paginate;
    }
    public $timestamps = false;

}
