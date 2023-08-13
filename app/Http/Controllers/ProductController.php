<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->service->getAllProducts()
            ->map(function($product) {
                $product['edit'] = route('edit', [ $product['id'] ]);

                return $product;
            });

        return Inertia::render('Products/PsrList', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Products/PsrForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->service->create($request->all());

        $request->session()->flash('success', 'Produto cadastrado com sucesso');
        return Inertia::location('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        try {
            $product = $this->service->getProductById($product->id);

            return Inertia::render('Products/PsrForm', [
                'product' => $product->toArray(),
            ]);

        } catch (RecordsNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Product $product)
    {
        $result = $this->service->deleteProduct($product);

        if ($result) {
            $request->session()->flash('success', 'Produto removido com sucesso');
        } else {
            $request->session()->flash('failed', 'Falha ao tentar remover o produto');
        }

        return Inertia::location('/');
    }
}
