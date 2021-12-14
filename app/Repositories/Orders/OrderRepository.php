<?php

namespace App\Repositories\Orders;

use App\Models\Order;

interface OrderRepository
{
    public function all(?int $perPage): object;

    public function findById(int $id): Order;

    public function update(int $id, string $document, int $sellerId): Order;

    public function allOrdersWithItems(?int $perPage, ?array $sort);
}
