<?php

namespace App\Http\Controllers\V1;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Repositories\Orders\OrderRepository;
use Exception;
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

    public function show(int $id): JsonResponse
    {
        $order = $this->repository->findById($id);

        if (is_null($order)) {
            return response()->json([], 204);
        }

        return response()->json($order);
    }

    public function update(int $id, OrderRequest $request): JsonResponse
    {
        $validRequest = $request->validated();

        try {
            $order = $this->repository->update(
                $id,
                $validRequest['customer_document'],
                $validRequest['seller_id']
            );
        } catch (NotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

        return response()->json($order);
    }

    public function report(Request $request): JsonResponse
    {
        $detailedOrders = $this->repository->allOrdersWithItems(
            $request->query('per_page'),
            $request->query('sort')
        );

        if (is_null($detailedOrders)) {
            return response()->json([], 204);
        }

        return response()->json($detailedOrders);
    }
}
