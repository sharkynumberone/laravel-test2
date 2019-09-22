<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectEventLogService
 * @package App\Services
 */
class ProjectEventLogService extends AbstractService
{
    /**
     * Set repository class
     * @return mixed|string
     */
    public static function getRepository()
    {
        return \App\Repositories\ProjectEventLogRepository::class;
    }

    /**
     * Store log
     * @param Model $model
     * @param array $params
     * @return mixed
     */
    public function store(Model $model, array $params) {
        return (static::getRepository())::store($model, $params);
    }

    /**
     * Show logs by project
     * @param Model $model
     * @param array $params
     * @return mixed
     */
    public function show(Model $model, array $params) {
       return (static::getRepository())::show($model, $params);
    }
}
