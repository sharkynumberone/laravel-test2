<?php

namespace App\Repositories;

/**
 * Class Repository
 * @package App\Repositories
 */
abstract class AbstractRepository
{
    /**
     * @return mixed
     */
    abstract static public function getClassName();

    /**
     * @param array $array
     * @return mixed
     */
    public function create(array $array)
    {
        return (self::getClassName())::create($array);
    }


    /**
     * @param array $array
     * @param int $id
     * @return mixed
     */
    public function update(array $array, int $id)
    {
        $model = (self::getClassName())::find($id);
        $model->update($array);

        return $model->fresh();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        $model = (self::getClassName())::find($id);

        return $model->delete();
    }
}
