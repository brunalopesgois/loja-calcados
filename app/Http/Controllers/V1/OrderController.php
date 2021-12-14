<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Orders\OrderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderRepository $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request): JsonResponse
    {
        $orders = $this->repository->all(
            $request->query('per_page')
        );

        if (is_null($orders)) {
            return response()->json([], 204);
        }

        return response()->json($orders);
    }
}
