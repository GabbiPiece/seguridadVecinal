<?php
class ZonasController extends \BaseController {

  
    //aca hacemos el metodo para listar usuarios
    
    public function getlist() {
        //

        $zonas = Zona::paginate(20);
        $data = [
            'zona' => $zonas,
        ];

        return View::make('admin/zonas_list', $data);
    }

    
       //para buscar usuarios
    public function getFind() {
        //
        $valor= Input::get('zona_valor');
        $zonas = Zona::find_all($valor);
        $data = [

            'zona' => $zonas,
        ];

         return View::make('admin/zonas_list', $data);
    }    
   
    //para crear usuarios
    
    public function getcreate() {
        //
        return View::make('admin/zonas_create');
    }

    
    //para insertar valores a la db usuarios
    
    public function poststore() {
        //
        $rules = array(
            'zona_calle' => 'required:zona,zona_calle',
            'zona_numero' => 'required | numeric:zona,zona_numero',
            'zona_barrio' => 'required:zona,zona_barrio', 
           
        );

        $attributes = array(
            'zona_calle' => 'calle',
            'zona_numero' => 'numero',
            'zona_barrio' => 'barrio',
        );
        $validator = Validator::make(Input::all(), $rules);
        $validator->setAttributeNames($attributes);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('zonas/create')
                            ->withErrors($validator)->withInput(Input::all());
        }

        //Se crea una instancia de objeto para ingresar los valores
        //y se guarda
        $zonas = new Zona();
        $zonas->zona_calle = Input::get('zona_calle');
        $zonas->zona_numero = Input::get('zona_numero'); 
        $zonas->zona_barrio = Input::get('zona_barrio');  
        $zonas->save();

        //Se envia un mensaje de tipo flash solo se muestra una vez redireccionado
        //en el caso de actualizar la pagina desaparece
       // Session::flash('message','El usuario se guardo correctamente');

        //Si todos se cumplio correctamente redirecciona
       // return Redirect::to('usuarios');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getedit($id) {
        //
                //Se busca el id y se lo agrega a un objeto
        $zonas = Zona::find($id);

        $data = [
            'zona' => $zonas,

        ];
        //Llama a la vista y envia el objeto
        
        
        return View::make('admin/zonas_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    
    //para actualizar
    
    public function putUpdate($id) {
        
             $rules = array(
            'zona_calle' => 'required:zona,zona_calle',
            'zona_numero' => 'required | numeric:zona,zona_numero',
            'zona_barrio' => 'required:zona,zona_barrio', 
           
        );

        $attributes = array(
             'zona_calle' => 'calle',
            'zona_numero' => 'numero',
            'zona_barrio' => 'barrio',
        );
        
        $validator = Validator::make(Input::all(), $rules);
        $validator->setAttributeNames($attributes);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('zonas/create')
                            ->withErrors($validator)->withInput(Input::all());
        }

        
        $zonas = Zona::find($id);
        $zonas->zona_calle = Input::get('zona_calle');
        $zonas->zona_numero = Input::get('zona_numero'); 
        $zonas->zona_barrio = Input::get('zona_barrio');  
        $zonas->save();

        //Se envia un mensaje de tipo flash solo se muestra una vez redireccionado
        //en el caso de actualizar la pagina desaparece
        //Session::flash('message', 'El usuario se actualizo correctamente');
        //Si todos se cumplio correctamente redirecciona
        //return Redirect::to('usuarios');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteDestroy($id) {
        //
             //Se crea una instalncia del objeto con el id
        //y se elimina
        $zonas = Zona::find($id);
        $zonas->delete();
        //Se envia un mensaje de tipo flash solo se muestra una vez redireccionado
        //en el caso de actualizar la pagina desaparece
        //Session::flash('message','El usuario se elimino correctamente' );
        //Si todos se cumplio correctamente redirecciona
       // return Redirect::to('usuarios');
        
    }

}