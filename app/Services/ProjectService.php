<?php
namespace App\Services;

/**
 * Class ProjectService
 * @package App\Services
 */
class ProjectService extends AbstractService
{
    /**
     * @return mixed|string
     */
    public static function getRepository()
    {
        return \App\Repositories\ProjectRepository::class;
    }

}
