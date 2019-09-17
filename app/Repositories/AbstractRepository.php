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
     * Paginated items
     * @param $paginate
     * @return mixed
     */
    public static function paginated($paginate)
    {
        return (static::getClassName())::query()
            ->orderBy('created_at', 'asc')
            ->paginate($paginate);
    }


    /**
     * Get all items
     * @return mixed
     */
    public static function all()
    {
        return (static::getClassName())::query()->orderBy(
            'created_at', 'asc')->get();
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
