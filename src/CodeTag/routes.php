<?php

Route::group(array(
    'prefix' => 'admin/tags',
    'as' => 'admin.tags.',
    'middleware' => array('web'),
    'namespace' => 'CodePress\CodeTag\Controllers'),
    function() {
        Route::get('/',       array('uses' => 'AdminTagsController@index',  'as' => 'index'));
        Route::get('/create', array('uses' => 'AdminTagsController@create', 'as' => 'create'));
        Route::post('/store', array('uses' => 'AdminTagsController@store',  'as' => 'store'));
        Route::get('/{id}/delete', array('uses' => 'AdminTagsController@destroy', 'as' => 'destroy'));
        Route::get('/{id}/edit', array('uses' => 'AdminTagsController@edit', 'as' => 'edit'));
    }
);