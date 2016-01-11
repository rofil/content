<?php

namespace Rofil\Content\Entity\Eloquent;

use Rofil\Content\Entity\Contracts\NewsCategoryInterface;
use Rofil\Content\Entity\Contracts\ListInterface;

class NewsCategoryRepository implements NewsCategoryInterface, ListInterface
{
    public function __construct(NewsCategory $entity)
    {
        $this->entity = $entity;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function get($id, array $options = array())
    {
        return $this->entity->with('getNews')->find($id);
    }

    public function all($perpage=20, $page=null, array $options = array())
    {
        $en = $this->entity;
        return $en->paginate($perpage);
    }

    public function insert(array $data)
    {
        $en = $this->entity;
        $en->fill($data)->save();
        return $en;
    }

    public function update($id, array $data)
    {
        $en = $this->entity->find($id);
        $en->fill($data)->save();
        return $en;
    }

    public function delete($id)
    {
        $this->entity->destroy($id);
    }

    public function lists(array $options = array())
    {
        return $this->entity->lists("name", "id");
    }

    public function parseFromString($string)
    {
        $string = trim($string);
        if($string == "") return [];
        $ri = explode(',', $string);
        return array_map(function($item){
            return strtolower(trim($item));
        }, $ri);
    }

    public function getListByNames($string)
    {
        $names = $this->parseFromString($string);
        if(count($names) == 0) return [];
        $nameCategories = $this->entity->whereIn('name', $names)->lists('name', 'id')->toArray();
        $categories = array_keys($nameCategories);
        $new_categories = array_diff($names, $nameCategories);
        if(count($new_categories) > 0){
            $new_insert_categories = array_map(function($i){
                return ['name' => $i];
            }, $new_categories);    
            $this->entity->insert($new_insert_categories);
            $categories = $this->entity->whereIn('name', $names)->lists('id', 'id')->toArray();
        }
        return $categories;
    }
}