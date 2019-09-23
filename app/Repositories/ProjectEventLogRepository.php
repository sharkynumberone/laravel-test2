<?php

namespace App\Repositories;


use App\Models\ProjectEventLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

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

        if (isset($params['date_from']) && isset($params['date_to'])) {
            $query->whereBetween('created_at', [$params['date_from'], $params['date_to']]);
        }

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

    /**
     * Get most active user
     * @param Model $model
     * @return mixed
     */
    public static function getMostActiveUser(Model $model) {
        $table = App::make(static::getClassName())->getTable();
        $query = DB::table($table)
            ->select('user_id')
            ->where('project_id', '=', $model->id)
            ->groupBy('user_id')
            ->orderBy(DB::raw('COUNT(user_id)'), 'desc')
            ->limit(1)
            ->get();

        return $query;
    }

    /**
     * Get most active event
     * @param Model $model
     * @return mixed
     */
    public static function getMostActiveEvent(Model $model) {
        $table = App::make(static::getClassName())->getTable();
        $query = DB::table($table)
            ->select('event_type')
            ->where('project_id', '=', $model->id)
            ->groupBy('event_type')
            ->orderBy(DB::raw('COUNT(event_type)'), 'desc')
            ->limit(1)
            ->get();

        return $query;
    }

    /**
     * Get most active event
     * @param Model $model
     * @return mixed
     */
    public static function getProjectEvents(Model $model) {
        $table = App::make(static::getClassName())->getTable();
        $query = DB::table($table)
            ->select(array('event_url', DB::raw('COUNT(event_url) as count')))
            ->where('project_id', '=', $model->id)
            ->groupBy('event_url')
            ->groupBy('project_id')
            ->get();

        return $query;
    }

    /**
     * Get count events group by day of week
     * @param Model $model
     * @return \Illuminate\Support\Collection
     */
    public static function getCountOfEventByDayOfWeek(Model $model) {
        $table = App::make(static::getClassName())->getTable();
        $query = DB::table($table)
            ->select(array(DB::raw('Date(created_at) as date'), DB::raw('COUNT(event_url) as count')))
            ->where('project_id', '=', $model->id)
            ->groupBy(DB::raw('Date(created_at)'))
            ->get();

        return $query;
    }

}
