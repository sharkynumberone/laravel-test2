<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository
 * @package App\Repositories
 */
abstract class AbstractRepository
{
    /**
     * Get class name
     * @return mixed
     */
    abstract static public function getClassName();

    /**
     * Get all items
     * @param array $params
     * @return mixed
     */
    public static function all(array $params)
    {
        return (static::getClassName())::orderBy($params['sort_by'])->paginate(config('total.per_page'));
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
