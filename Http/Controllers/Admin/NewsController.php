<?php

namespace Rofil\Content\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Rofil\Content\Entity\Contracts\NewsInterface;
use Rofil\Content\Http\Request\NewsFormRequest;

class NewsController extends Controller
{
    protected $repo;

    protected $viewsPath = "RofilContent::admin.news"; 

    protected $routePath = "RofilContent.admin.news";

    public function __construct(NewsInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return view($this->viewsPath.".index", ['data'=>$this->repo->all()]);
    }

    public function create()
    {
        return view($this->viewsPath.".create", ['entity'=>$this->repo->getEntity()]);
    }

    public function store(NewsFormRequest $request)
    {
        $en = $this->entity->insert($request->all());
        return redirect($this->routePath.".show", ['id'=>$en->id]);
    }

    public function edit($id)
    {
        return view($this->viewsPath.".edit", ['entity'=>$this->repo->get($id)]);
    }

    public function update(NewsFormRequest $request, $id)
    {
        $en = $this->entity->update($id, $request->all());
        return redirect($this->routePath.".show", ['id'=>$en->id]);
    }

    public function destroy($id)
    {
        $en = $this->entity->delete($id);
        return redirect($this->routePath.".index");
    }
}