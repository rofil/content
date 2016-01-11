<?php

namespace Rofil\Content\Http\Controllers;

use App\Http\Controllers\Controller;
use Rofil\Content\Entity\Contracts\InformationInterface;

class InformationController extends Controller
{
    protected $repo;
    protected $viewsPath = "RofilContent::information"; 
    protected $routePath = "RofilContent.information";

    public function __construct(InformationInterface $repo)
    {
        $this->repo = $repo;
    }

    public function show($id)
    {
        try {
            $information = $this->repo->get($id);
        } catch (\Exception $e) {
            throw new \Exception("Page not found", 404);
        }

        return view($this->viewsPath.".show", [ 'entity' => $information ]);
    }
}