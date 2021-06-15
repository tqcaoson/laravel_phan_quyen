<?php

namespace Core\Services\Role;

use Core\Repositories\Role\RoleRepositoryContract;

class RoleService implements RoleServiceContract
{
    protected $repository;

    public function __construct(RoleRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function paginate()
    {
        return $this->repository->paginate(5);
    }

    public function pluckName()
    {
        return $this->repository->pluckName();
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