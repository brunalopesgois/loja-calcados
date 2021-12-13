<?php

namespace App\Repositories\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProductRepositoryEloquent implements ProductRepository
{
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function all(?int $perPage): object
    {
        return $this->product
            ->with('colors')
            ->paginate($perPage ?? 5);
    }

    public function find(int $id): Collection
    {
        return $this->product
            ->with('colors')
            ->where('id', $id)
            ->get();
    }

    public function update(string $name, int $lotId, string $description, float $price): Product
    {
        //
    }
}
