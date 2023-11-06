<?php

namespace App\Repositories;

interface IPharmacy
{
  public function getAllPharmacies();
  public function getPharmacyById($pharmacyId);
  public function create($data);
  public function update($data);
  public function delete($pharmacyId);
  public function showProductInPharmacy($pharmacyId);
}
