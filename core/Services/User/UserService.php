<?php

namespace Core\Services\User;

use Core\Repositories\User\UserRepositoryContract;
use Core\Services\BaseService;

class UserService extends BaseService implements UserServiceContract
{
    protected $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }
}