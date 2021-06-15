<?php

namespace Core\Services\Product;

use Core\Repositories\Product\ProductRepositoryContract;

class ProductService implements ProductServiceContract
{
    protected $repository;

    public function __construct(ProductRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }

    public function paginate()
    {
        return $this->repository->paginate(5);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

}