<?php

namespace Core\Repositories\Product;
use Core\Repositories\BaseRepository;
use App\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryContract
{
    protected $model;

    public function __construct(Product $model)
    {
        return $this->model = $model;
    }
}