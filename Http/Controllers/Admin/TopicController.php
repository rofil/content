<?php

namespace Rofil\Content\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Rofil\Content\Entity\Contracts\TopicInterface;
use Rofil\Content\Http\Requests\TopicFormRequest;

class TopicController extends Controller
{
    protected $repo;

    protected $viewsPath = "RofilContent::admin.topic"; 

    protected $routePath = "RofilContent.admin.topic";

    public function __construct(TopicInterface $repo)
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

    public function store(TopicFormRequest $request)
    {
        $en = $this->repo->insert($request->all());
        return redirect()->route($this->routePath.".index");
    }

    public function edit($id)
    {
        return view($this->viewsPath.".edit", [
            'entity'=>$this->repo->get($id),
            'url' => route($this->routePath.'.update', ['id'=>$id]),
            'method'=>'PUT'
        ]);
    }

    public function update(TopicFormRequest $request, $id)
    {
        $en = $this->repo->update($id, $request->all());
        return redirect()->route($this->routePath.".index");
    }

    public function destroy($id)
    {
        $en = $this->repo->delete($id);
        return redirect()->route($this->routePath.".index");
    }
}