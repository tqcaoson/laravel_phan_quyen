<?php

namespace Core\Services\Product;

use Core\Repositories\Product\ProductRepositoryContract;
use Core\Services\BaseService; 

class ProductService extends BaseService implements ProductServiceContract
{
    protected $repository;

    public function __construct(ProductRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }
}