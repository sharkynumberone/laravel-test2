<?php
namespace App\Services;

use Illuminate\Support\Str;
use \Validator;

/**
 * Class ProjectService
 * @package App\Services
 */
class ProjectService extends AbstractService
{
    /**
     * Set repository class
     * @return mixed|string
     */
    public static function getRepository()
    {
        return \App\Repositories\ProjectRepository::class;
    }

    /**
     * Generate random key for project
     * @return string
     */
    public static function randomKey(){
        $key = Str::random(40);
        $validator = Validator::make(['key'=>$key],['key'=>'unique:projects,key']);
        if($validator->fails()){
            return static::randomKey();
        }

        return $key;
    }

    /**
     * Create item
     * @param array $array
     * @return mixed
     */
    public static function create(array $array)
    {
        $array['key'] = static::randomKey();

        return (static::getRepository())::create($array);
    }

}
