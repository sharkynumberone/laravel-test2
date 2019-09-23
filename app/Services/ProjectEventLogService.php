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

    /**
     * Get most active user
     * @param Model $model
     * @return mixed
     */
    public function getMostActiveUser(Model $model) {
        return (static::getRepository())::getMostActiveUser($model);
    }

    /**
     * Get most active event
     * @param Model $model
     * @return mixed
     */
    public function getMostActiveEvent(Model $model) {
        return (static::getRepository())::getMostActiveEvent($model);
    }

    /**
     * Get project events
     * @param Model $model
     * @return mixed
     */
    public function getProjectEvents(Model $model) {
        return (static::getRepository())::getProjectEvents($model);
    }

    /**
     * Get count events group by day of week
     * @param Model $model
     * @return mixed
     */
    public function getCountOfEventByDayOfWeek(Model $model) {
        return (static::getRepository())::getCountOfEventByDayOfWeek($model);
    }

    /**
     * Get most viewed page
     * @param Model $model
     * @return mixed
     */
    public static function getTopProjectEventUrl(Model $model) {
        return (static::getRepository())::getTopProjectEventUrl($model);
    }
}
