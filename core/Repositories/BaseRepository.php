<?php

namespace Core\Repositories;
use Core\Repositories\RepositoryInterface;

class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function all() 
    {
        return $this->model->all();
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
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->model->find($id);
        return $model->update($data);
    }

    public function destroy($id)
    {
        $model = $this->model->find($id);
        return $model->delete();
    }
}