<?php
//  Aqui declaro todos los helpers que tienen que ver con los elementos HTml en las vistas 
namespace App\Helpers\Envato;

class Html{

    public static function invalidInput($errors){
        return (count( $errors )>0 ? 'is-invalid' : '') ;
    }
}