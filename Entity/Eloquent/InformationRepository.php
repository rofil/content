<?php

namespace Rofil\Content\Entity\Eloquent;

use Rofil\Content\Entity\Contracts\InformationInterface;
use Rofil\Content\Entity\Contracts\ListInterface;
use Rofil\Content\Entity\Contracts\InformationCategoryInterface;
use Illuminate\Contracts\Auth\Guard;

class InformationRepository implements InformationInterface
{
    protected $entity;
    protected $auth;

    public function __construct(Information $entity, Guard $auth)
    {
        $this->entity = $entity;
        $this->auth   = $auth;
    }

    /**
     * Get the entity of topic
     * @return Information The Entity of the topic
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Get the entity of the topic with the spesific id
     * @param  int $id         The id of the topic
     * @param  array  $options The options of entity
     * @return Information            Information
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
        $en = $en->paginate(10);

        $cols = $en->map(function($item, $key){
            $item->author = $item->getUser == null ? "Admin" : ucfirst($item->getUser->name);
            $item->namePublished = $item->published == 1 ? "Published" : 'Draft';
            return $item;
        });

        $cols->pagination=$en->render();
        return $cols;
    }

    public function insert(array $data)
    {
        $data['user_id'] = $this->auth->user()->id;
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