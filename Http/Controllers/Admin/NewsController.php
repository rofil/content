<?php

namespace Rofil\Content\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Rofil\Content\Entity\Contracts\NewsInterface;
use Rofil\Content\Http\Requests\NewsFormRequest;

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
        return view($this->viewsPath.".index", ['data'=>$this->repo->all(null, null, ['order_updated'=>'DESC'])]);
    }

    public function show($id)
    {
        return view($this->viewsPath.".show", ['entity'=>$this->repo->get($id)]);
    }

    public function create()
    {
        return view($this->viewsPath.".create", [
            'entity'=>$this->repo->getEntity(),
            'url' => route('RofilContent.admin.news.store'),
            'method'=>'POST'
        ]);
    }

    public function store(NewsFormRequest $request)
    {
        $data = $request->all();
        $image = $this->repo->upload($request);
        if($image != null){
            $data['image'] = $image;
        }

        $en = $this->repo->insert($data);
        return redirect()->route($this->routePath.".show", ['id'=>$en->id]);
    }

    public function edit($id)
    {
        return view($this->viewsPath.".edit", [
            'entity'=>$this->repo->get($id),
            'url' => route('RofilContent.admin.news.update', ['id'=>$id]),
            'method'=>'PUT'
        ]);
    }

    public function update(NewsFormRequest $request, $id)
    {
        $data = $request->all();
        $image = $this->repo->upload($request);
        if($image != null){
            $data['image'] = $image;
        }
        
        $en = $this->repo->update($id, $data);
        return redirect()->route($this->routePath.".show", ['id'=>$en->id]);
    }

    public function destroy($id)
    {
        $en = $this->repo->delete($id);
        return redirect()->route($this->routePath.".index");
    }
}