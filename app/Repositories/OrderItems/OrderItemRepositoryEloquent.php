<?php

namespace App\Repositories\OrderItems;

use App\Exceptions\NotFoundException;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderItemRepositoryEloquent implements OrderItemRepository
{
    private OrderItem $model;
    private Order $orderModel;
    private Product $productModel;

    public function __construct(OrderItem $model, Order $orderModel, Product $productModel)
    {
        $this->model = $model;
        $this->orderModel = $orderModel;
        $this->productModel = $productModel;
    }

    public function create(int $orderId, int $productId): OrderItem
    {
        $order = $this->orderModel->find($orderId);
        if (is_null($order)) {
            throw new NotFoundException("There is no " . Order::class . " with id $orderId");
        }

        $product = $this->productModel->find($productId);
        if (is_null($product)) {
            throw new NotFoundException("There is no " . Product::class . " with id $orderId");
        }

        DB::beginTransaction();
        $orderItem = $this->model->create([
            'order_id' => $orderId,
            'product_id' => $productId
        ]);
        $this->updateAmount($order, $product, 'sum');
        DB::commit();

        return $orderItem;
    }

    public function delete(int $orderItemId): bool
    {
        $orderItem = $this->model->find($orderItemId);
        if (is_null($orderItem)) {
            throw new NotFoundException("There is no " . OrderItem::class . " with id $orderItemId");
        }

        $order = $this->orderModel->find($orderItem->order_id);
        $product = $this->productModel->find($orderItem->product_id);

        DB::beginTransaction();
        $this->updateAmount($order, $product, 'subtract');
        $this->model->destroy($orderItemId);
        DB::commit();

        return true;
    }

    private function updateAmount(Order $order, Product $product, string $operation): void
    {
        if ($operation === 'sum') {
            $newAmount = $order->amount + $product->price;
        }

        if ($operation === 'subtract') {
            $newAmount = $order->amount - $product->price;
        }

        $order->amount = $newAmount;
        $order->update();
    }
}
