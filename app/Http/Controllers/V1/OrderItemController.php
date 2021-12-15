<?php

namespace App\Http\Controllers\V1;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderItemRequest;
use App\Repositories\OrderItems\OrderItemRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    private OrderItemRepository $repository;

    public function __construct(OrderItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(OrderItemRequest $request): JsonResponse
    {
        $validRequest = $request->validated();

        try {
            $orderItem = $this->repository->create(
                $validRequest['order_id'],
                $validRequest['product_id']
            );
        } catch (NotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

        return response()->json($orderItem, 201);
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->repository->delete($id);
        } catch (NotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

        return response()->json([], 204);
    }
}
