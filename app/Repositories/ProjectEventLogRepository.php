<?php

namespace App\Repositories;


use App\Models\ProjectEventLog;

/**
 * Class ProjectEventLogRepository
 * @package App\Repositories
 */
class ProjectEventLogRepository extends AbstractRepository
{
    /**
     * Set class
     * @return mixed|string
     */
    public static function getClassName()
    {
        return ProjectEventLog::class;
    }

}
