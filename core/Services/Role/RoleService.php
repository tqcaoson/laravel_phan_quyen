<?php

namespace Core\Services\Role;

use Core\Repositories\Role\RoleRepositoryContract;
use Core\Services\BaseService;

class RoleService extends BaseService implements RoleServiceContract
{
    protected $repository;

    public function __construct(RoleRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function pluckName()
    {
        return $this->repository->pluckName();
    }
}