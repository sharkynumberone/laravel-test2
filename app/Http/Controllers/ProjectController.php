<?php

namespace App\Http\Controllers;

use App\Services\ProjectService;
use Illuminate\Http\Request;

/**
 * Class ProjectController
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * @var ProjectService
     */
    protected $project_service;

    /**
     * ProjectController constructor.
     * @param ProjectService $project_service
     */
    public function __construct(ProjectService $project_service)
    {
        $this->project_service = $project_service;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|mixed
     */
    public function index()
    {
        return $this->project_service->all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        return $this->project_service->store($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function show($id)
    {
        return $this->project_service->show($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        return $this->project_service->update($request, $id);
    }

    /**
     * @param $id
     * @return int|mixed
     */
    public function destroy($id)
    {
        return $this->project_service->destroy($id);
    }
}
