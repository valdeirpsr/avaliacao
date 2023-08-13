<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function create($data)
    {
        $model = new Product();
        $model->name = $data['name'];
        $model->description = $data['description'];
        $model->voltage = $data['voltage'];
        $model->manufacturer = $data['manufacturer'];
        $model->save();

        return $model;
    }

    public function deleteProduct(Product $product): bool|null
    {
        return $product->delete();
    }

    public function getByProductId(int $product): ?Product
    {
        return Product::find($product);
    }

    public function update(int $productId, array $product): bool
    {
        /** Limita quais campos serão alterados */
        return Product::where('id', $productId)
            ->update([
                'name' => $product['name'],
                'manufacturer' => $product['manufacturer'],
                'voltage' => $product['voltage'],
                'description' => $product['description'],
            ]);
    }
}
