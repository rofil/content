<?php
Route::group(['middleware'=>'auth'], function(){
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

    /*
    sddf
     */
    Route::get('/admin/news-category', [
        'as'   => "RofilContent.admin.news-category.index",
        'uses' => 'Admin\NewsCategoryController@index'
    ]);

    Route::get('/admin/news-category/{id}/show', [
        'as'   => "RofilContent.admin.news-category.show",
        'uses' => 'Admin\NewsCategoryController@show'
    ]);

    Route::get('/admin/news-category/create', [
        'as'   => "RofilContent.admin.news-category.create",
        'uses' => 'Admin\NewsCategoryController@create'
    ]);

    Route::post('/admin/news-category/create', [
        'as'   => "RofilContent.admin.news-category.store",
        'uses' => 'Admin\NewsCategoryController@store'
    ]);

    Route::get('/admin/news-category/{id}/edit', [
        'as'   => "RofilContent.admin.news-category.edit",
        'uses' => 'Admin\NewsCategoryController@edit'
    ]);

    Route::put('/admin/news-category/{id}/update', [
        'as'   => "RofilContent.admin.news-category.update",
        'uses' => 'Admin\NewsCategoryController@update'
    ]);

    Route::delete('/admin/news-category/{id}/destroy', [
        'as'   => "RofilContent.admin.news-category.destroy",
        'uses' => 'Admin\NewsCategoryController@destroy'
    ]);

});



Route::get("/news/{id}/show", ['uses'=>'NewsController@show', 'as'=>'RofilContent.news.show']);
Route::get("/news/{id}/category", ['uses'=>'NewsController@showByCategory', 'as'=>'RofilContent.news.showByCategory']);
// Event::listen('illuminate.query', function($query)
// {
//     var_dump($query);
// });

