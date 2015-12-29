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
        return $this->entity->find($id);
    }

    public function all($perpage=null, $page=null, array $options = array())
    {
        $en = $this->entity;
        return $en->all();
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
        $cat = explode(",", $string);
        $cars = array_map(function($item){
            return trim($item);
        }, $cat);
    }
}