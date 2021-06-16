<?php

namespace Core\Repositories\Product;

use App\Product;

class ProductRepository implements ProductRepositoryContract
{
    protected $model;

    public function __construct(Product $model)
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
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function destroy($id)
    {
        $model = $this->model->find($id);
        return $model->delete();
    }

}