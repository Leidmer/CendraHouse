<?php

function getModulesArray(){
    $a = [
        '0' => 'Propietats',
        '1' => 'Blog'
        //Aqui es poden afegir més moduls per si alguna vegada es volgues afegir uns tipus que no siguin propietats, d'aquesta forma estan ordenats en 2 super categories
    ];

    return $a;
}

//Per poder mostrar si es admin o no
function getRoleUserArray($mode, $id){
    $roles = ['0' => 'Usuari Normal', '1' => 'Administrador'];
    if(!is_null($mode)):
        return $roles;
    else:
        return $roles[$id];
    endif;
}

function getUserStatusArray($mode, $id){
    $status = ['0' => 'Registrat', '1' => 'Confirmat', '100' => 'Banejat'];
    if(!is_null($mode)):
        return $status;
    else:
        return $status[$id];
    endif;
    
}