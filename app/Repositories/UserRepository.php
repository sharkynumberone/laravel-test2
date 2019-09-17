<?php

namespace App\Repositories;


use App\Models\User;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends AbstractRepository
{
    /**
     * Set class
     * @return string
     */
    public static function getClassName()
    {
        return User::class;
    }
}
