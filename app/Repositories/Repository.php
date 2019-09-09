<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository
 * @package App\Repositories
 */
class Repository implements RepositoryInterface
{
    // model property on class instances
    /**
     * @var Model
     */
    protected $model;

    // Constructor to bind model to repo

    /**
     * Repository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Model[]|mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    // create a new record in the database

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    // remove record from the database

    /**
     * @param $id
     * @return int|mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id

    /**
     * @param $id
     * @return Model|mixed
     */
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    // Get the associated model

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model

    /**
     * @param $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships

    /**
     * @param $relations
     * @return \Illuminate\Database\Eloquent\Builder|Model
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
