<?php

namespace Rofil\Content\Entity\Contracts;

interface TopicInterface
{
    public function getEntity();
    public function get($id, array $options = array());
    public function all($perpage, $page, array $options=array());
    public function insert(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function lists(array $options);
}