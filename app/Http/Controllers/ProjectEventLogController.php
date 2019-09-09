<?php

namespace App\Http\Controllers;

use App\Models\ProjectEventLog;
use App\Repositories\Repository;
use Illuminate\Http\Request;

/**
 * Class ProjectEventLogController
 * @package App\Http\Controllers
 */
class ProjectEventLogController extends Controller
{
    // space that we can use the repository from
    /**
     * @var Repository
     */
    protected $model;

    /**
     * ProjectController constructor.
     * @param ProjectEventLog $log
     */
    public function __construct(ProjectEventLog $log)
    {
        // set the model
        $this->model = new Repository($log);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|mixed
     */
    public function index()
    {
        return $this->model->all();
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|integer'
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
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        // update model and only pass in the fillable fields
        $this->model->update($request->only($this->model->getModel()->fillable), $id);

        return $this->model->find($id);
    }

    /**
     * @param $id
     * @return int|mixed
     * @throws \Exception
     */
    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}
