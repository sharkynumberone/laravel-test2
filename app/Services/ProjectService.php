<?php

namespace App\Services;

use App\Models\Project;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;

/**
 * Class ProjectService
 * @package App\Services
 */
class ProjectService
{
    /**
     * @var Repository
     */
    protected $model;

    /**
     * ProjectService constructor.
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        // set the model
        $this->model = new Repository($project);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|mixed
     */
    public function all()
    {
        return $this->model->all();
    }


    /**
     * @param $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'url' => 'required|max:255'
        ]);

        // create record and pass in only fields that are fillable
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function show($id)
    {
        return $this->model->show($id);
    }

    /**
     * Update department
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->model->update($request->all(), $id);

        return $this->model->find($id);
    }

    /**
     * Update department
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        return $this->model->delete($id);
    }

    /**
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
}
