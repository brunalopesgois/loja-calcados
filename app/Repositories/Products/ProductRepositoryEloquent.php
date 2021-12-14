<?php

namespace App\Repositories\Products;

use App\Exceptions\LotNotFoundException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ProductNotFoundException;
use App\Models\Lot;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepositoryEloquent implements ProductRepository
{
    private Product $model;
    private Lot $lotModel;

    public function __construct(Product $model, Lot $lotModel)
    {
        $this->model = $model;
        $this->lotModel = $lotModel;
    }

    public function all(?int $perPage): object
    {
        return $this->model->paginate($perPage ?? 5);
    }

    public function findById(int $id): Product
    {
        return $this->model->find($id);
    }

    public function update(
        int $id,
        string $name,
        int $lotId,
        string $color,
        string $description,
        float $price
    ): Product {
        $product = $this->model->find($id);

        if (is_null($product)) {
            throw new NotFoundException("There is no " . Product::class . " with id $id");
        }

        $lot = $this->lotModel->find($lotId);

        if (is_null($lot)) {
            throw new NotFoundException("There is no " . Lot::class . " with id $lotId");
        }

        DB::beginTransaction();
        $product->name = $name;
        $product->lot_id = $lotId;
        $product->color = $color;
        $product->description = $description;
        $product->price = $price;
        $product->update();
        DB::commit();

        return $product;
    }
}
