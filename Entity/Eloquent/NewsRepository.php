<?php

namespace Rofil\Content\Entity\Eloquent;

use Rofil\Content\Entity\Contracts\NewsInterface;

class NewsRepository implements NewsInterface
{
    public function __construct(News $entity)
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

        if(array_key_exists('order_updated', $options)){
            $en->orderBy("updated_at", $options['order_updated']);
        }

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
}