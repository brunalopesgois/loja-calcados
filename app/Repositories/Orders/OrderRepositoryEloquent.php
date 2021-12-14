<?php

namespace App\Repositories\Orders;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepositoryEloquent implements OrderRepository
{
    private Order $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function all(?int $perPage): object
    {
        return $this->model->paginate($perPage ?? 5);
    }

    public function findById(int $id): Order
    {
        //
    }

    public function update(int $id, string $document, int $sellerId): Order
    {
        //
    }

    public function allOrdersWithItems(int $perPage, array $sort)
    {
        //
    }
}
