<?php
namespace App\Services;

/**
 * Class AbstractService
 * @package App\Services
 */
abstract class AbstractService
{
    /**
     * @return mixed
     */
    abstract static public function getRepository();

    /**
     * @param array $array
     * @return mixed
     */
    public function create(array $array)
    {
        return (self::getRepository())::create($array);
    }

    /**
     * @param array $array
     * @param int $id
     * @return mixed
     */
    public function update(array $array, int $id)
    {
        return (self::getRepository())::update($array, $id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return (self::getRepository())::delete($id);
    }

}
