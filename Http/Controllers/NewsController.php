<?php

namespace Rofil\Content\Http\Controllers;

use App\Http\Controllers\Controller;
use Rofil\Content\Entity\Contracts\NewsInterface;

class NewsController extends Controller
{
    protected $repo;
    protected $viewsPath = "RofilContent::news"; 
    protected $routePath = "RofilContent.news";

    public function __construct(NewsInterface $repo)
    {
        $this->repo = $repo;
    }

    public function show($id)
    {
        try {
            $news = $this->repo->get($id);
        } catch (\Exception $e) {
            throw new \Exception("Page not found", 404);
        }

        return view($this->viewsPath.".show", [ 'entity' => $news ]);
    }

    public function showByCategory($id) 
    {
        $news = $this->repo->all(null, null,['category'=>$id]);
        return view($this->viewsPath.".show-by-category", [ 'data' => $news ]);
    }

    public function index(\Rofil\Content\Entity\Contracts\TopicInterface $topic) 
    {
        $news = $this->repo->all(null, null,['order_updated'=>'DESC']);
        return view($this->viewsPath.".index", [ 'data' => $news ]);
    }
}