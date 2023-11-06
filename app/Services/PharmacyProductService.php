<?php

namespace App\Services;

use App\Repositories\implementation\PharmacyProductRepository;

class PharmacyProductService
{
   public $pharmacyProductService;

   public function __construct(PharmacyProductRepository $pharmacyProductService)
   {
       $this->pharmacyProductService=$pharmacyProductService;
   }

    public function createProductInPharmacy($data)
    {
        $productCreated = $this->pharmacyProductService->create($data);
        return [
            'message' => 'Created Successfully',
            'product' => $productCreated
        ];
    }

  public function getProductIdInPharmacy($pharmacyProductId)
  {
      $product=$this->pharmacyProductService->getProductPharmacyId($pharmacyProductId);
      dd($product);
      return [
          'message'  => 'Selected Successfully',
          'product' => $product,
      ];
  }

    public function searchPharmacyProduct($data)
    {
        $products=$this->pharmacyProductService->searchProduct($data);

        return [
            'message' => 'Created Successfully',
            'products' => $products
        ];
    }

    public function getCheapestProductInPharmacies($productId)
    {
        $products = $this->pharmacyProductService->getCheapestProductInPharmacies($productId)->toArray();

        return [
            'message'  => "succeed in getting the cheapest products in the  five pharmacies",
            'products' => $products,
        ];
    }

    public function updatePharmacyProduct($data)
    {
        $product = $this->pharmacyProductService->getIdProductInPharmacy($data['id']);

        if (!is_object($product)) {
            return [
                'error' => 'Product not found',
            ];
        }
        $updatedProduct = $this->pharmacyProductService->update($data);

        return [
            'message' => 'Updated Successfully',
            'product' => $product

        ];

    }

}
