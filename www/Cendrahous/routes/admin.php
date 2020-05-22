<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard');
    Route::get('users', 'Admin\UserController@getUsers');

    // Modul Propietats
    Route::get('/properties', 'Admin\PropertyController@getHome');
    Route::get('/property/add', 'Admin\PropertyController@getPropertyAdd');
    Route::get('/property/{id}/edit', 'Admin\PropertyController@getPropertyEdit');
    Route::post('/property/add', 'Admin\PropertyController@postPropertyAdd');
    Route::post('/property/{id}/edit', 'Admin\PropertyController@postPropertyEdit');
    Route::post('/property/{id}/gallery/add', 'Admin\PropertyController@postPropertyGalleryAdd');
    Route::get('/property/{id}/gallery/{gid}/delete', 'Admin\PropertyController@getPropertyGalleryDelete');
    

    // Tipus de propietats (categories)
    Route::get('/types/{module}', 'Admin\TypesController@getHome');
    Route::post('/type/add', 'Admin\TypesController@postTypeAdd');
    Route::get('/type/{id}/edit', 'Admin\TypesController@getTypeEdit');
    Route::post('/type/{id}/edit', 'Admin\TypesController@postTypeEdit');
    Route::get('/type/{id}/delete', 'Admin\TypesController@getTypeDelete');
});