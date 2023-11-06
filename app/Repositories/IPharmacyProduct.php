<?php

namespace App\Repositories;



use Illuminate\Support\Collection;

interface IPharmacyProduct
{

  public function create($data);
  public function searchProduct($data);
  public function getProductPharmacyId($productPharmacyId);
  public function getCheapestProductInPharmacies($productId):Collection;

}
