<?php

namespace App\Repositories\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProductRepositoryEloquent implements ProductRepository
{
    public function all(?int $perPage)
    {
        //
    }

    public function update(string $name, int $lotId, string $description, float $price): Product
    {
        //
    }
}
