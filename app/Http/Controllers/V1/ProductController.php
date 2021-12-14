<?php

namespace App\Http\Controllers\V1;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\Products\ProductRepository;
use Exception;
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

    public function show(int $id): JsonResponse
    {
        $product = $this->repository->findById($id);

        if (is_null($product)) {
            return response()->json([], 204);
        }

        return response()->json($product);
    }

    public function update(int $id, ProductRequest $request): JsonResponse
    {
        $validRequest = $request->validated();

        try {
            $product = $this->repository->update(
                $id,
                $validRequest['name'],
                $validRequest['lot_id'],
                $validRequest['color'],
                $validRequest['description'],
                $validRequest['price']
            );

            return response()->json($product);
        } catch (NotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
