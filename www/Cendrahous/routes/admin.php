<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard');
    Route::get('users', 'Admin\UserController@getUsers');

    // Modul Propietats
    Route::get('/properties', 'Admin\PropertyController@getHome');
    Route::get('/property/add', 'Admin\PropertyController@getPropertyAdd');

    // Tipus de propietats (categories)
    Route::get('/types', 'Admin\TypesController@getHome');
});