<?php

namespace App\Repositories;

use App\Helpers\ApplyDefaultSorting;
use App\Helpers\ApplyPagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository
 * @package App\Repositories
 */
abstract class AbstractRepository
{
    use ApplyPagination, ApplyDefaultSorting;

    /**
     * Get class name
     * @return mixed
     */
    abstract static public function getClassName();

    /**
     * Apply pagination & default sorting to query
     *
     * @param Builder $query
     * @param array $params
     * @return array
     */
    public static function applyListParams(Builder $query, array $params): array
    {
        if (!isset($params['limit'])) {
            $params['limit'] = config('options.pagination_per_page');
        }

        $count = $query->count();
        static::applyPagination($query, $params);
        static::applyDefaultSorting($query, $params);

        return [
            'items' => $query->get(),
            'count' => $count
        ];
    }


    /**
     * Get all items
     * @param array $params
     * @return mixed
     */
    public static function all(array $params = [])
    {
        $query = (static::getClassName())::query();

        return static::applyListParams($query, $params);
    }

    /**
     * Create item
     * @param array $array
     * @return mixed
     */
    public static function create(array $array)
    {
        return (static::getClassName())::create($array);
    }

    /**
     * Update item
     * @param array $array
     * @param Model $model
     * @return mixed
     */
    public static function update(array $array, Model $model)
    {
        $model->update($array);

        return $model->fresh();
    }

    /**
     * Delete item
     * @param Model $model
     * @return mixed
     * @throws \Exception
     */
    public static function delete(Model $model)
    {
        return $model->delete();
    }
}
