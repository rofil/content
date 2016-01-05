<?php

namespace Rofil\Content\Entity\Eloquent;

use Rofil\Content\Entity\Contracts\TopicInterface;
use Rofil\Content\Entity\Contracts\ListInterface;
use Rofil\Content\Entity\Contracts\TopicCategoryInterface;
use Illuminate\Contracts\Auth\Guard;

class TopicRepository implements TopicInterface, ListInterface
{
    protected $entity;

    public function __construct(Topic $entity)
    {
        $this->entity   = $entity;
    }

    /**
     * Get the entity of topic
     * @return Topic The Entity of the topic
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Get the entity of the topic with the spesific id
     * @param  int $id         The id of the topic
     * @param  array  $options The options of entity
     * @return Topic            Topic
     */
    public function get($id, array $options = array())
    {
        $en = $this->entity->with("getUser")->find($id);
        $en->author = $en->getUser == null ? "Admin" : ucfirst($en->getUser->name);
        return $en;
    }


    public function all($perpage=null, $page=null, array $options = array())
    {
        $en = $this->entity;
        $en = $en->get();

        return $en;
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

    public function lists(array $options=[])
    {
        return $this->entity->lists("name", "id");
    }
}