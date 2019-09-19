<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewProjectEventLog;
use App\Models\Project;
use App\Services\ProjectEventLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class ProjectEventLogController
 * @package App\Http\Controllers
 */
class ProjectEventLogController extends Controller
{
    /**
     * @var ProjectEventLogService
     */
    protected $project_event_log_service;

    /**
     * ProjectController constructor.
     * @param ProjectEventLogService $project_event_log_service
     */
    public function __construct(ProjectEventLogService $project_event_log_service)
    {
        $this->project_event_log_service = $project_event_log_service;
    }

    /**
     * Show all projects page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $project_event_logs = $this->project_event_log_service->all($request->all());

        return view('project_event_log.index', compact('project_event_logs'));
    }

    /**
     * Store project log from external api
     * @param Project $project
     * @param CreateNewProjectEventLog $request
     * @return JsonResponse
     */
    public function store(Project $project, CreateNewProjectEventLog $request) : JsonResponse
    {
        $this->project_event_log_service->store($project, $request->all());

        return response()->json(['success' => true]);
    }
}
