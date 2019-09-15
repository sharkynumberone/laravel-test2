<?php
namespace App\Services;

/**
 * Class ProjectEventLogService
 * @package App\Services
 */
class ProjectEventLogService extends AbstractService
{
    /**
     * @return mixed|string
     */
    public static function getRepository()
    {
        return \App\Repositories\ProjectEventLogRepository::class;
    }
}
