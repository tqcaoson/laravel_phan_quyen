<?php

namespace Core\Services\Role;
use Core\Services\ServiceInterface;

interface RoleServiceContract extends ServiceInterface
{
    public function pluckName();
}