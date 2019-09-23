<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Services\ProjectEventLogService;

/**
 * Class ProjectEventLogStatistics
 * @package App\Http\Controllers
 */
class ProjectEventLogStatisticsController extends Controller
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
     * Get most active user
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getStatistics(Project $project)
    {
        $most_active_user = $this->project_event_log_service->getMostActiveUser($project);
        $most_active_event = $this->project_event_log_service->getMostActiveEvent($project);
        $most_viewed_page = $this->project_event_log_service->getTopProjectEventUrl($project);
        $events = $this->project_event_log_service->getProjectEvents($project);
        $events_dw = $this->project_event_log_service->getCountOfEventByDayOfWeek($project);

        return view('project_event_log.statistics', compact(
            'most_active_user',
            'most_active_event',
            'events',
            'events_dw',
            'most_viewed_page'
        ));
    }
}
