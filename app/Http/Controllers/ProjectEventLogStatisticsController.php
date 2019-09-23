<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Services\ProjectEventLogService;

/**
 * Class ProjectEventLogStatistics
 * @package App\Http\Controllers
 */
class ProjectEventLogStatisticsController  extends Controller
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
    public function getMostActiveUser(Project $project)
    {
        $most_active_user = $this->project_event_log_service->getMostActiveUser($project);

        return view('project_event_log.most-active-user', compact('most_active_user'));
    }

    /**
     * Get most active event
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMostActiveEvent(Project $project)
    {
        $most_active_event = $this->project_event_log_service->getMostActiveEvent($project);

        return view('project_event_log.most-active-event', compact('most_active_event'));
    }

    /**
     * Get project events
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProjectEvents(Project $project)
    {
        $events = $this->project_event_log_service->getProjectEvents($project);

        return view('project_event_log.events', compact('events'));
    }

    /**
     * Get count events group by day of week
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCountOfEventByDayOfWeek(Project $project) {
        $events = $this->project_event_log_service->getCountOfEventByDayOfWeek($project);
        return view('project_event_log.dates-with-events', compact('events'));
    }
}
