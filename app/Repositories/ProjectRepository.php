<?php

namespace App\Repositories;


use App\Models\Project;

/**
 * Class ProjectRepository
 * @package App\Repositories
 */
class ProjectRepository extends AbstractRepository
{
    /**
     * @return string
     */
    public static function getClassName()
    {
        return Project::class;
    }

}
