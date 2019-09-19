<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
     * Show all projects page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $projects = $this->project_service->all($request->all());

        return view('project.index', compact('projects'));
    }

    /**
     * Show create project form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createForm()
    {
        return view('project.create');
    }

    /**
     * Show update project form
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateForm(Project $project)
    {
        return view('project.update', compact('project'));
    }

    /**
     * Create new project
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->project_service->create($request->all());

        return redirect()->route('project.index');
    }

    /**
     * Update project
     * @param Request $request
     * @param Project $project
     * @return mixed
     */
    public function update(Request $request, Project $project)
    {
        $this->project_service->update($request->all(), $project);

        return redirect()->back();
    }

    /**
     * Delete project
     * @param Project $project
     * @return int|mixed
     */
    public function destroy(Project $project)
    {
        $this->project_service->delete($project);

        return redirect()->back();
    }
}
