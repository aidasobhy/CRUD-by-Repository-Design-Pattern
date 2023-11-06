<?php

namespace App\Repositories\implementation;

use App\Models\PharmacyProduct;
use App\Models\Product;
use App\Repositories\IProduct;

class ProductRepository implements IProduct
{

    public function getAllProducts($searchProduct = null)
    {

        $response = Product::query()
            ->select(
                'id',
                'product_title',
                'product_description',
                'product_image'
            );

        if ($searchProduct != null) {
            $response = $response->where('product_title', 'like', '%' . $searchProduct . '%');
        }

        $response = $response->get();

        return $response;
    }

    public function create($data)
    {
        return Product::query()
            ->create([
                'product_title'       => $data['product_title'],
                'product_description' => $data['product_description'],
                'product_image'       => $data['product_image'],
            ]);
    }

    public function update($data)
    {
        return Product::query()
            ->where('id', '=', $data['id'])
            ->limit(1)
            ->update([
                'product_title'       => $data['product_title'],
                'product_description' => $data['product_description'],
            ]);
    }

    public function delete($productId)
    {
        return Product::query()
            ->where('id', '=', $productId)
            ->limit(1)
            ->delete();
    }

    public function getProductById($productId)
    {
        return Product::query()->find($productId);
    }

    public function getProductDetails($productId)
    {
        return PharmacyProduct::query()
            ->select(
                'pharmacy_products.product_price',
                'pharmacy_products.product_quantity',
                'pharmacies.pharmacy_name'
            )
            ->join('pharmacies', 'pharmacy_products.pharmacy_id', '=', 'pharmacies.id')
            ->join('products', 'pharmacy_products.product_id', '=', 'products.id')
            ->where('products.id', '=', $productId)
            ->get();
    }
}
