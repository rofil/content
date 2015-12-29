<?php

namespace Rofil\Content\Entity\Eloquent;

use Rofil\Content\Entity\Contracts\NewsInterface;
use Rofil\Content\Entity\Contracts\NewsCategoryInterface;

class NewsRepository implements NewsInterface
{
    protected $entity;
    protected $category;

    public function __construct(News $entity, NewsCategoryInterface $category)
    {
        $this->entity   = $entity;
        $this->category = $category;
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

        if(array_key_exists('order_updated', $options)){
            $en->orderBy("updated_at", $options['order_updated']);
        }

        return $en->all();
    }

    public function insert(array $data)
    {
        print_r('<pre>');

        $ri = (explode(',', $data['categories']));
        $r = array_map(function($item){
            return strtolower(trim($item));
        }, $ri);

        print_r($r);

        die();
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
}