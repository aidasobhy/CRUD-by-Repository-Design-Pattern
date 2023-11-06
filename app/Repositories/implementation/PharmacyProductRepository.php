<?php

namespace App\Repositories\implementation;

use App\Models\PharmacyProduct;
use App\Models\Product;
use App\Repositories\IPharmacyProduct;
use Illuminate\Support\Collection;

class PharmacyProductRepository implements IPharmacyProduct
{

    public function create($data)
    {
        return PharmacyProduct::query()
            ->create([
                'product_id'       => $data['product_id'],
                'pharmacy_id'      => $data['pharmacy_id'],
                'product_price'    => $data['product_price'],
                'product_quantity' => $data['product_quantity'],
            ]);
    }



    public function searchProduct($data)
    {
       return Product::query()
           ->select('id','product_title')
           ->where('product_title','like','%'.$data.'%')
           ->limit(10)
           ->get();
    }

    public function getProductPharmacyId($productPharmacyId)
    {
        return PharmacyProduct::query()->find($productPharmacyId);

    }



    public function getCheapestProductInPharmacies($productId): Collection
    {
       return PharmacyProduct::query()
           ->select(
               'pharmacy_products.pharmacy_id',
               'pharmacies.pharmacy_name',
               'pharmacy_products.product_price'
           )
           ->join('pharmacies','pharmacy_products.pharmacy_id','=','pharmacies.id')
           ->where('pharmacy_products.product_id','=',$productId)
           ->orderBy('pharmacy_products.product_price')
           ->limit(2)
           ->get();
    }



}
