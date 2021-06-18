<?php

namespace Core\Services\Permission;

use Core\Repositories\Permission\PermissionRepositoryContract;
use Core\Services\BaseService;

class PermissionService extends BaseService implements PermissionServiceContract
{
    protected $repository;

    public function __construct(PermissionRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

}