<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
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
        $products = $this->service->getAllProducts();

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
}
