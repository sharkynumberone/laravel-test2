<?php

namespace App\Repositories;


use App\Models\ProjectEventLog;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * Create item
     * @param Model $model
     * @param array $array
     * @return mixed
     */
    public static function store(Model $model, array $array)
    {
        $array['project_id'] = $model->id;

        return (static::getClassName())::create($array);
    }

    /**
     * Get all items
     * @param array $params
     * @return array|mixed
     */
    public static function all(array $params = [])
    {
        $query = (static::getClassName())::with('project');

        return static::applyListParams($query, $params);
    }

    /**
     * Show logs by project
     * @param Model $model
     * @param array $array
     * @return array
     */
    public static function show(Model $model, array $array)
    {
        $query = (static::getClassName())::where('project_id', $model->id);

        return static::applyListParams($query, $array);
    }

}
