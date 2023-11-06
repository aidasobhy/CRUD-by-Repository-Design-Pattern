<?php

namespace App\Repositories\implementation;

use App\Models\Pharmacy;
use App\Models\PharmacyProduct;
use App\Repositories\IPharmacy;

class PharmacyRepository implements IPharmacy
{

    public function getAllPharmacies()
    {
        return Pharmacy::query()
            ->select(
                'id',
                'pharmacy_name',
                'pharmacy_address'
            )->get();
    }

    public function getPharmacyById($pharmacyId)
    {
        return Pharmacy::query()->find($pharmacyId);
    }

    public function create($data)
    {
        return Pharmacy::query()
            ->create([
                'pharmacy_name'    => $data['pharmacy_name'],
                'pharmacy_address' => $data['pharmacy_address'],
            ]);
    }

    public function update($data)
    {
       return Pharmacy::query()
           ->where('id','=',$data['id'])
           ->limit(1)
           ->update([
               'pharmacy_name'    => $data['pharmacy_name'],
               'pharmacy_address' => $data['pharmacy_address'],
           ]);
    }

    public function delete($pharmacyId)
    {
        return Pharmacy::query()
            ->where('id', '=', $pharmacyId)
            ->limit(1)
            ->delete();
    }

    public function showProductInPharmacy($pharmacyId)
    {

        return Pharmacy::query()
            ->select(
                'pharmacy_products.id',
                'pharmacy_products.product_price',
                'pharmacy_products.product_quantity',
                'products.id',
                'products.product_title',
                'products.product_image',
                'products.product_description',
            )
            ->join('pharmacy_products','pharmacies.id','=','pharmacy_products.pharmacy_id')
            ->join('products','pharmacy_products.product_id','=','products.id')
            ->where('pharmacies.id', '=', $pharmacyId)
            ->get();
    }
}
