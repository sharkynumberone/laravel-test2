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

    public static function all(array $params)
    {
        return (static::getClassName())::with('project')->orderBy($params['sort_by'])->paginate(config('total.per_page'));
    }

}
