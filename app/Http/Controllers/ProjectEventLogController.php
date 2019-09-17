<?php

namespace App\Http\Controllers;

use App\Services\ProjectEventLogService;
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
     * Create project event log
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        return $this->project_event_log_service->create($request->all());
    }
}
