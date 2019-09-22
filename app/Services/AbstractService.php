<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

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
