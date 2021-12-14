<?php

namespace App\Repositories\Orders;

use App\Exceptions\NotFoundException;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class OrderRepositoryEloquent implements OrderRepository
{
    private Order $model;
    private Customer $customerModel;
    private Seller $sellerModel;

    public function __construct(Order $model, Customer $customerModel, Seller $sellerModel)
    {
        $this->model = $model;
        $this->customerModel = $customerModel;
        $this->sellerModel = $sellerModel;
    }

    public function all(?int $perPage): object
    {
        return $this->model->paginate($perPage ?? 5);
    }

    public function findById(int $id): Order
    {
        return $this->model->find($id);
    }

    public function update(int $id, string $document, int $sellerId): Order
    {
        $order = $this->model->find($id);
        if (is_null($order)) {
            throw new NotFoundException("There is no " . Order::class . " with id $id");
        }

        $customer = $this->customerModel->find($document);
        if (is_null($customer)) {
            throw new NotFoundException("There is no " . Customer::class . " with document $document");
        }

        $seller = $this->sellerModel->find($sellerId);
        if (is_null($seller)) {
            throw new NotFoundException("There is no " . Seller::class . " with id $sellerId");
        }

        DB::beginTransaction();
        $order->customer_document = $customer->document;
        $order->seller_id = $seller->id;
        $order->update();
        DB::commit();

        return $order;
    }

    public function allOrdersWithItems(?int $perPage, ?array $sort)
    {
        $ordersWithItems = $this->model->with('orderItems');

        if ($sort) {
            $ordersWithItems = $this->ordenate($ordersWithItems, $sort);
        }

        return $ordersWithItems->paginate($perPage ?? 5);
    }

    private function ordenate(object $ordersWithItems, array $sort)
    {
        if (array_key_exists('amount', $sort)) {
            $ordersWithItems = $ordersWithItems->orderBy('amount', $sort['amount']);
        }

        if (array_key_exists('date', $sort)) {
            $ordersWithItems = $ordersWithItems->orderBy('created_ad', $sort['date']);
        }

        return $ordersWithItems;
    }
}
