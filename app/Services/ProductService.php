<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function deleteProduct(Product $product): bool|null
    {
        if (!$product->exists()) {
            throw new NotFoundHttpException('Produto não encontrado');
        }

        return $this->repository->deleteProduct($product);
    }

    public function getProductById(int $productId): Product
    {
        $product = $this->repository->getByProductId($productId);

        if (!$product) {
            throw new RecordsNotFoundException('Produto não encontrado');
        }

        return $product;
    }
}
