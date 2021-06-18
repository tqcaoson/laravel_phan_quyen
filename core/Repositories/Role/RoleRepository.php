<?php

namespace Core\Repositories\Role;
use Core\Repositories\BaseRepository;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryContract
{
    protected $model;

    public function __construct(Role $model)
    {
        return $this->model = $model;
    }

    public function paginate()
    {
        return $this->model->latest()->with('permissions')->paginate(5);
    }

    public function pluckName()
    {
        return $this->model->pluck('name','name')->all();
    }

    public function store($data)
    {
        $role = $this->model->create(['name' => $data['name']]);
        $role->syncPermissions($data['permission']);
        return $role;
    }

    public function update($id, $data)
    {
        $model = $this->model->find($id);
        $model->update(['name' => $data['name']]);
        $model->syncPermissions($data['permission']);
        return $model;
    }

}