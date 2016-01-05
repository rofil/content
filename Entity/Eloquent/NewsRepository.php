<?php

namespace Rofil\Content\Entity\Eloquent;

use Rofil\Content\Entity\Contracts\NewsInterface;
use Rofil\Content\Entity\Contracts\NewsCategoryInterface;
use Illuminate\Contracts\Auth\Guard;

class NewsRepository implements NewsInterface
{
    protected $entity;
    protected $category;
    protected $auth;

    public function __construct(News $entity, NewsCategoryInterface $category, Guard $auth)
    {
        $this->entity   = $entity;
        $this->category = $category;
        $this->auth = $auth;
    }

    /**
     * Get the entity of news
     * @return News The Entity of the news
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Get the entity of the news with the spesific id
     * @param  int $id         The id of the news
     * @param  array  $options The options of entity
     * @return News            News
     */
    public function get($id, array $options = array())
    {
        $en = $this->entity->with("getUser", "getCategories")->find($id);
        $en->author = $en->getUser == null ? "Admin" : ucfirst($en->getUser->name);
        $en->categories = implode(", ", $en->getCategories->lists("name")->toArray());
        return $en;
    }


    public function all($perpage=null, $page=null, array $options = array())
    {
        $en = $this->entity;

        if(array_key_exists('category', $options)){
            $en =  $this->category->get($options['category'])->getNews;
            return $en;
        }

        if(array_key_exists('order_updated', $options)){
            $en = $en->orderBy("updated_at", $options['order_updated']);
        }

        if(array_key_exists('published', $options)){
            $en = $en->orderBy("published", $options['published']);
        }

        $en = $en->with("getUser");
        $en = $en->get();

        $cols = $en->map(function($item, $key){
            $item->author        = $item->getUser   == null ? "Admin" : ucfirst($item->getUser->name);
            $item->namePublished = $item->published == 0    ? "Draft" : "Published";
            return $item;
        });

        return $cols;
    }

    public function insert(array $data)
    {
        $en = $this->entity;
        $categories = $this->category->getListByNames($data['categories']);
        $data['user_id'] = $this->auth->user()->id;
        $en->fill(array_except($data, ['categories']))->save();
        $en->getCategories()->sync(count($categories) > 0 ? $categories : []);
        return $en;
    }

    public function update($id, array $data)
    {
        $en = $this->entity->find($id);
        $categories = $this->category->getListByNames($data['categories']);
        $en->fill(array_except($data, ['categories']))->save();
        $en->getCategories()->sync(count($categories) > 0 ? $categories : []);
        return $en;
    }

    public function delete($id)
    {
        $this->entity->destroy($id);
    }
}