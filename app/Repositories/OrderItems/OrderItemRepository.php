<?php

namespace App\Repositories\OrderItems;

use App\Models\OrderItem;

interface OrderItemRepository
{
    public function create(int $orderId, int $productId): OrderItem;

    public function delete(int $orderItemId): bool;
}
