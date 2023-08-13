<?php

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('O método getAllProducts deverá retornar todos os produtos cadastrados', function () {
    Product::factory(5)->create();

    $repo = new ProductRepository();
    $total = $repo->getAllProducts();

    $this->assertCount(5, $total);
});
