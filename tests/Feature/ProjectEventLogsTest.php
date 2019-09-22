<?php

namespace Tests\Feature;

use App\Repositories\ProjectEventLogRepository;
use App\Services\ProjectEventLogService;
use App\Services\ProjectService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class ProjectEventLogsTest
 * @package Tests\Feature
 */
class ProjectEventLogsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create new project event log path
     * @param int $id
     * @return string
     */
    protected function itemPath(int $id)
    {
        return route('project_event_log.store', ['project' => $id]);
    }

    /**
     * Show detail logs page path
     * @param int $id
     * @return string
     */
    protected function showPath(int $id) {
        return route('project_event_log.show', ['project' => $id]);
    }

    /**
     * Create project event log from api
     *
     * @test
     */
    public function createProjectEventLogTest()
    {
        $project = ProjectService::create(['name' => 'проект 1', 'url' => 'http://ya.ru']);

        $this->postJson($this->itemPath($project->id), [])->assertStatus(403);

        $this->postJson($this->itemPath(2), [])->assertStatus(404);

        $data = [
            'project_id' => $project->id,
            'user_id' => 1,
            'event_type' => 'Просмотр главной страницы',
            'event_url' => 'http://site.com',
        ];

        $this->postJson($this->itemPath($project->id),
            $data)->assertStatus(403);

        $data['project_key'] = $project->key;
        $this->postJson($this->itemPath($project->id),
            $data)->assertStatus(200);
    }

    /**
     * Show project event log from api
     *
     * @test
     */
    public function showProjectEventLogTest()
    {
        $project = ProjectService::create(['name' => 'проект 1', 'url' => 'http://ya.ru']);

        $data = [
            'project_id' => $project->id,
            'user_id' => 1,
            'event_type' => 'Просмотр главной страницы',
            'event_url' => 'http://site.com',
        ];

        ProjectEventLogService::create($data);

        $this->getJson($this->showPath($project->id))->assertStatus(403);

        $this->json('GET', $this->showPath($project->id), [
            'key' => $project->key
        ])->assertStatus(200);

    }
}
