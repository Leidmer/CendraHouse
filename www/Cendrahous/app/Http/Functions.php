<?php

function getModulesArray(){
    $a = [
        '0' => 'Propietats',
        '1' => 'Blog'
        //'2' => 'Prova'
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