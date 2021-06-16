<?php

namespace Core\Repositories\Role;
use Core\Repositories\RepositoryInterface;

interface RoleRepositoryContract extends RepositoryInterface
{
    public function pluckName();
}