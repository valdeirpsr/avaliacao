<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    public function __construct(
        private ProductRepository $repository
    ) {}

    public function getAllProducts()
    {
        return $this->repository->getAllProducts();
    }

    public function create($data)
    {
        $rules = new ProductRequest();
        $validator = Validator::make($data, $rules->rules());

        $validator->validate();

        return $this->repository->create($data);
    }
}
