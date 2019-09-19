<?php

namespace Tests\Feature;

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

    protected function itemPath(int $id)
    {
        return route('project_event_log.store', ['project' => $id]);
    }

    /**
     * A basic test example.
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
}
