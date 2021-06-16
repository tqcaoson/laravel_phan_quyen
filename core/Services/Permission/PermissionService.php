<?php

namespace Core\Services\Permission;

use Core\Repositories\Permission\PermissionRepositoryContract;

class PermissionService implements PermissionServiceContract
{
    protected $repository;

    public function __construct(PermissionRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function all() 
    {
        return $this->repository->all();
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

}