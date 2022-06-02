<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{

    public function create(array $data)
    {
        $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
        ]);
    }

    public function updateProduct($product, array $data)
    {
        return $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],

        ]);
    }



}
