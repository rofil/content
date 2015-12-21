<?php

Route::get('/admin/news', [
    'as'   => "RofilContent.admin.news.index",
    'uses' => 'Admin\NewsController@index'
]);

Route::get('/admin/news/{id}/show', [
    'as'   => "RofilContent.admin.news.show",
    'uses' => 'Admin\NewsController@show'
]);

Route::get('/admin/news/create', [
    'as'   => "RofilContent.admin.news.create",
    'uses' => 'Admin\NewsController@create'
]);

Route::post('/admin/news/create', [
    'as'   => "RofilContent.admin.news.store",
    'uses' => 'Admin\NewsController@store'
]);

Route::get('/admin/news/{id}/edit', [
    'as'   => "RofilContent.admin.news.edit",
    'uses' => 'Admin\NewsController@edit'
]);

Route::put('/admin/news/{id}/update', [
    'as'   => "RofilContent.admin.news.update",
    'uses' => 'Admin\NewsController@update'
]);

Route::delete('/admin/news/{id}/destroy', [
    'as'   => "RofilContent.admin.news.destroy",
    'uses' => 'Admin\NewsController@destroy'
]);

