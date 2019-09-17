<?php
namespace App\Services;

/**
 * Class UserService
 * @package App\Services
 */
class UserService extends AbstractService
{
    /**
     * Set repository class
     * @return mixed|string
     */
    public static function getRepository()
    {
        return \App\Repositories\UserRepository::class;
    }

}
