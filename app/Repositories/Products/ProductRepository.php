<?php

namespace App\Repositories\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepository
{
    public function all(?int $perPage): object;

    public function findById(int $id): Product;

    public function update(
        int $id,
        string $name,
        int $lotId,
        string $color,
        string $description,
        float $price
    ): Product;
}
