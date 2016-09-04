<?php

return array(

    'multi' => array(
        'account' => array(
            'driver' => 'eloquent',
            'model' => 'Account'
        ),
        //modelo para traer campos de la tabla usuario
        'user' => array(
            'driver' => 'database',
            'table' => 'usuario',
            'email' => 'emails.auth.reminder',
            'driver' => 'eloquent',
            'model' => 'User',

        )
    ),

    
    'reminder' => array(

        'email' => 'emails.auth.reminder',

        'table' => 'password_reminders',

        'expire' => 60,

    ),

);
