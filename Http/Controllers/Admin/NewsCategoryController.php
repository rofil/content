<?php

namespace Rofil\Content\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Rofil\Content\Entity\Contracts\NewsCategoryInterface;
use Rofil\Content\Http\Requests\CategoryFormRequest;

class NewsCategoryController extends Controller
{
    protected $repo;

    protected $viewsPath = "RofilContent::admin.news-category"; 

    protected $routePath = "RofilContent.admin.news-category";

    public function __construct(NewsCategoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return view($this->viewsPath.".index", ['data'=>$this->repo->all()]);
    }

    public function show($id)
    {
        return view($this->viewsPath.".show", ['entity'=>$this->repo->get($id)]);
    }

    public function create()
    {
        return view($this->viewsPath.".create", [
            'entity'=>$this->repo->getEntity(),
            'url' => route($this->routePath.'.store'),
            'method'=>'POST'
        ]);
    }

    public function store(CategoryFormRequest $request)
    {
        $en = $this->repo->insert($request->all());
        return redirect()->route($this->routePath.".show", ['id'=>$en->id]);
    }

    public function edit($id)
    {
        return view($this->viewsPath.".edit", [
            'entity'=>$this->repo->get($id),
            'url' => route($this->routePath.'.update', ['id'=>$id]),
            'method'=>'PUT'
        ]);
    }

    public function update(CategoryFormRequest $request, $id)
    {
        $en = $this->repo->update($id, $request->all());
        return redirect()->route($this->routePath.".show", ['id'=>$en->id]);
    }

    public function destroy($id)
    {
        $en = $this->repo->delete($id);
        return redirect()->route($this->routePath.".index");
    }
}