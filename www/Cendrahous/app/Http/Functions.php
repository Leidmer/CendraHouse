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
function getRoleUserArrayKey($id){
    $roles = ['0' => 'Usuari Normal', '1' => 'Administrador'];
    return $roles[$id];
}

function getUserStatusArrayKey($id){
    $status = ['0' => 'Registrat', '1' => 'Confirmat', '100' => 'Banejat'];
    return $status[$id];
}