<?php

namespace Core\Repositories\Permission;

use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryContract
{
    protected $model;

    public function __construct(Permission $model)
    {
        return $this->model = $model;
    }

    public function paginate()
    {
        return $this->model->latest()->paginate(5);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

}