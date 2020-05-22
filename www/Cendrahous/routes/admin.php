<?php

Route::prefix('/admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');
    Route::get('users', 'Admin\UserController@getUsers')->name('user_list');

    // Modul Propietats
    Route::get('/properties', 'Admin\PropertyController@getHome')->name('properties');
    Route::get('/property/add', 'Admin\PropertyController@getPropertyAdd')->name('property_add');
    Route::get('/property/{id}/edit', 'Admin\PropertyController@getPropertyEdit')->name('property_edit');
    Route::post('/property/add', 'Admin\PropertyController@postPropertyAdd')->name('property_add');
    Route::post('/property/{id}/edit', 'Admin\PropertyController@postPropertyEdit')->name('property_edit');
    Route::post('/property/{id}/gallery/add', 'Admin\PropertyController@postPropertyGalleryAdd')->name('property_gallery_add');
    Route::get('/property/{id}/gallery/{gid}/delete', 'Admin\PropertyController@getPropertyGalleryDelete')->name('product_gallery_delete');
    

    // Tipus de propietats (categories)
    Route::get('/types/{module}', 'Admin\TypesController@getHome')->name('types');
    Route::post('/type/add', 'Admin\TypesController@postTypeAdd')->name('type_add');
    Route::get('/type/{id}/edit', 'Admin\TypesController@getTypeEdit')->name('type_edit');
    Route::post('/type/{id}/edit', 'Admin\TypesController@postTypeEdit')->name('type_edit');
    Route::get('/type/{id}/delete', 'Admin\TypesController@getTypeDelete')->name('type_delete');
});