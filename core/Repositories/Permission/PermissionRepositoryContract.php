<?php

namespace Core\Repositories\Permission;
use Core\Repositories\RepositoryInterface;

interface PermissionRepositoryContract extends RepositoryInterface
{
    public function all();
}