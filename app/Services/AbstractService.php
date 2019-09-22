<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class AbstractService
 * @package App\Services
 */
abstract class AbstractService
{
    /**
     * Get repository name
     * @return mixed
     */
    abstract static public function getRepository();

    /**
     * Get all items
     * @param array $params
     * @return mixed
     */
    public static function all(array $params = [])
    {
        return (static::getRepository())::all($params);
    }

    /**
     * Get all items with paginate
     * @param array $params
     * @return LengthAwarePaginator
     */
    public static function allWithPaginate(array $params = [])
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = config('options.pagination_per_page');

        $result = (static::getRepository())::all($params);

        $currentItems = array_slice($result['items']->toArray(), $perPage * ($currentPage - 1), $perPage);

        $paginator = new LengthAwarePaginator(
            $currentItems,
            $result['count'],
            $perPage,
            $currentPage,
            [
                'path' => \Request::url(),
                'query' => [
                    'page' => $currentPage
                ]
            ]);

        $results = $paginator->appends('sort_by', isset($params['sort_by']) ? $params['sort_by'] : 'id')
            ->appends('sort_direction', isset($params['sort_direction']) ? $params['sort_direction'] : 'asc');

        return $results;
    }

    /**
     * Create item
     * @param array $array
     * @return mixed
     */
    public static function create(array $array)
    {
        return (static::getRepository())::create($array);
    }

    /**
     * Update item
     * @param array $array
     * @param Model $model
     * @return mixed
     */
    public static function update(array $array, Model $model)
    {
        return (static::getRepository())::update($array, $model);
    }

    /**
     * Delete item
     * @param Model $model
     * @return mixed
     */
    public static function delete(Model $model)
    {
        return (static::getRepository())::delete($model);
    }

}
