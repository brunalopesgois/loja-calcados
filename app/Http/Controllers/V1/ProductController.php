<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Products\ProductRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request): JsonResponse
    {
        $products = $this->repository->all(
            $request->query('per_page')
        );

        if (is_null($products)) {
            return response()->json([], 204);
        }

        return response()->json($products);
    }
}
