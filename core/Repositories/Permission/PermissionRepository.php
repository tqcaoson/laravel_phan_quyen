<?php

namespace Core\Repositories\Permission;
use Core\Repositories\BaseRepository;
use Spatie\Permission\Models\Permission;

class PermissionRepository extends BaseRepository implements PermissionRepositoryContract
{
    protected $model;

    public function __construct(Permission $model)
    {
        return $this->model = $model;
    }

    public function all() 
    {
        return $this->model->all();
    }
}