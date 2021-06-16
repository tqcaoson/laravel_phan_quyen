<?php

namespace Core\Services\Permission;
use Core\Services\ServiceInterface;

interface PermissionServiceContract extends ServiceInterface
{
    public function all();
}