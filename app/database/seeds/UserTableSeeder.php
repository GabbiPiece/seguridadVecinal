<?php
use Illuminate\Support\Facades\Hash;
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
      /*  User::create([
            'usu_nombre' =>'Gabita',
            'usu_apellido' =>'Zorrita',
            'usu_celular' =>'15789642',
            'usu_zona' =>'Pueblo Diamante',
            'usu_username'   => 'chicuela',
            'usu_clave'   =>  Hash::make('secret'),
            'usu_email' =>'chicuela@yahoo.com.ar'
        ]);*/
        
        $users =[
            ['usu_nombre' =>'Gabriel', 'usu_apellido' => 'Caceres', 'usu_celular' =>'154061093', 'usu_zona'=>'Pueblo soto',
                
              'usu_username'=>'gabbi', 'usu_clave'   =>  'gabbi', 'usu_email' =>'gabi.carp26@gmail.com'
            ]        
            ]; 
        DB::table('usuarios')->insert($users);
    }
 
}