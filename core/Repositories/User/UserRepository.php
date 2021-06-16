<?php

namespace Core\Repositories\User;

use App\User;
use DB;
use Hash;

class UserRepository implements UserRepositoryContract
{
    protected $model;

    public function __construct(User $model)
    {
        return $this->model = $model;
    }

    public function paginate()
    {
        return $this->model->latest()->paginate(5);
    }

    public function find($id)
    {
        return $this->model->find($id);
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

    public function destroy($id)
    {
        $model = $this->model->find($id);
        return $model->delete();
    }

}