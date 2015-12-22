<?php

namespace Rofil\Content\Entity\Eloquent;

use Rofil\Content\Entity\Contracts\CategoryInterface;
use Rofil\Content\Entity\Contracts\ListInterface;

class CategoryRepository implements CategoryInterface, ListInterface
{
    public function __construct(Category $entity)
    {
        $this->entity = $entity;
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
        return $en->fill($data)->save();
    }

    public function update($id, array $data)
    {
        $en = $this->entity->find($id);
        return $en->fill($data)->save();
    }

    public function delete($id)
    {
        $this->entity->destroy($id);
    }

    public function list(array $options = array())
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