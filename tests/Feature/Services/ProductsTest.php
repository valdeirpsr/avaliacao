<?php

use App\Models\Products as ModelsProducts;
use App\Repositories\Products as RepositoriesProducts;
use App\Services\Products;

test('Um produto com dados inválidos não pode ser cadastrado', function () {
    $client = Mockery::mock(RepositoriesProducts::class);
    $client->shouldReceive('create')->never();

    $service = new Products($client);
    $service->create([]);
})->throws(Exception::class);

test('O produto com dados válidos deve ser cadastrado', function () {
    $fake = ModelsProducts::factory()->makeOne()->toArray();

    $service = new Products(new RepositoriesProducts);
    $service->create($fake);

    $this->assertDatabaseHas('products', $fake);
});
