<?php

namespace Core\Repositories\User;
use Core\Repositories\BaseRepository;
use App\User;
use Hash;

class UserRepository extends BaseRepository implements UserRepositoryContract
{
    protected $model;

    public function __construct(User $model)
    {
        return $this->model = $model;
    }

    public function store($data)
    {
        $data['password'] = Hash::make($data['password']);

        $user = $this->model->create($data);
        $user->assignRole($data['roles']);
        return $user;
    }

    public function update($id, $data)
    {
        if(!empty($data['password'])){ 
            $data['password'] = Hash::make($data['password']);
        }else{
            $data = array_except($data,array('password'));    
        }

        $model = $this->model->find($id);
        $model->update($data);

        $model->roles()->detach();

        $model->assignRole($data['roles']);
        return $model;
    }

}