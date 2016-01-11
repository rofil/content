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

    /**
     * ROUTE FOR ADMIN INFORMATION
     * 
     */
    Route::get('/admin/information', [
        'as'   => "RofilContent.admin.information.index",
        'uses' => 'Admin\InformationController@index'
    ]);

    Route::get('/admin/information/{id}/show', [
        'as'   => "RofilContent.admin.information.show",
        'uses' => 'Admin\InformationController@show'
    ]);

    Route::get('/admin/information/create', [
        'as'   => "RofilContent.admin.information.create",
        'uses' => 'Admin\InformationController@create'
    ]);

    Route::post('/admin/information/create', [
        'as'   => "RofilContent.admin.information.store",
        'uses' => 'Admin\InformationController@store'
    ]);

    Route::get('/admin/information/{id}/edit', [
        'as'   => "RofilContent.admin.information.edit",
        'uses' => 'Admin\InformationController@edit'
    ]);

    Route::put('/admin/information/{id}/update', [
        'as'   => "RofilContent.admin.information.update",
        'uses' => 'Admin\InformationController@update'
    ]);

    Route::delete('/admin/information{id}/destroy', [
        'as'   => "RofilContent.admin.information.destroy",
        'uses' => 'Admin\InformationController@destroy'
    ]);

    /**
     * ROUTE FOR ADMIN TOPIC
     * 
     */
    Route::get('/admin/topic', [
        'as'   => "RofilContent.admin.topic.index",
        'uses' => 'Admin\TopicController@index'
    ]);

    Route::get('/admin/topic/{id}/show', [
        'as'   => "RofilContent.admin.topic.show",
        'uses' => 'Admin\TopicController@show'
    ]);

    Route::get('/admin/topic/create', [
        'as'   => "RofilContent.admin.topic.create",
        'uses' => 'Admin\TopicController@create'
    ]);

    Route::post('/admin/topic/create', [
        'as'   => "RofilContent.admin.topic.store",
        'uses' => 'Admin\TopicController@store'
    ]);

    Route::get('/admin/topic/{id}/edit', [
        'as'   => "RofilContent.admin.topic.edit",
        'uses' => 'Admin\TopicController@edit'
    ]);

    Route::put('/admin/topic/{id}/update', [
        'as'   => "RofilContent.admin.topic.update",
        'uses' => 'Admin\TopicController@update'
    ]);

    Route::delete('/admin/topic{id}/destroy', [
        'as'   => "RofilContent.admin.topic.destroy",
        'uses' => 'Admin\TopicController@destroy'
    ]);

});



Route::get("/news/{id}/show", ['uses'=>'NewsController@show', 'as'=>'RofilContent.news.show']);
Route::get("/news/{id}/category", ['uses'=>'NewsController@showByCategory', 'as'=>'RofilContent.news.showByCategory']);
Route::get("/news", ['uses'=>'NewsController@index', 'as'=>'RofilContent.news.index']);
// Event::listen('illuminate.query', function($query)
// {
//     var_dump($query);
// });

Route::get("/information/{id}", ['uses'=>'InformationController@show', 'as'=>'RofilContent.information.show']);

class Rep
{
    protected $names = [];
    protected $group = [];

    public function add($value, $key=null)
    {
        if(!isset($this->names[$key])){
            $this->names[$key] = $value;
        }else{
            foreach($value as $index=>$m){
                $menus = $this->names[$key];
                if(array_has($menus, $index)){
                    $mi = array_get($menus, $index);
                    $menus = array_except($menus, $index);
                    $o = array_merge($m, $mi);
                    $menus = array_add($menus, $index, $o);
                }else{
                    $menus = array_add($menus, $index, $m);
                }
                $this->names[$key] = $menus;
            }
        }


        
    }

    public function get($key)
    {
        return $this->names[$key];
    }

    public function getAll()
    {
        return $this->names;
    }
}