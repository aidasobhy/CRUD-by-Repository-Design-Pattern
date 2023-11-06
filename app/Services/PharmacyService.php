<?php

namespace App\Services;

use App\Repositories\IPharmacy;

class PharmacyService
{
   public $pharmacyRepository;

    public function __construct(IPharmacy $pharmacyRepository)
    {
        $this->pharmacyRepository = $pharmacyRepository;
    }

    public function getAllPharmacies()
    {
        $pharmacies = $this->pharmacyRepository->getAllPharmacies();

        return [
            'message'    => 'Fetched Successfully',
            'pharmacies' => $pharmacies
        ];
    }

    public function createPharmacy($data)
    {
        $pharmacy=$this->pharmacyRepository->create($data);
        return [
            'message'    => 'Created Successfully',
            'pharmacy' => $pharmacy
        ];
    }

    public function editPharmacy($pharmacyId)
    {
        $pharmacy = $this->pharmacyRepository->getPharmacyById($pharmacyId);
        if (!isset($pharmacy)) {
            return [
                'error' => 'This Pharmacy Not Found'
            ];
        }

        return [
            'message'  => 'Fetched Successfully',
            'pharmacy' => $pharmacy
        ];
    }

    public function getPharmacyById($pharmacyId)
    {
        $pharmacy=$this->pharmacyRepository->getPharmacyById($pharmacyId);

        if (!isset($pharmacy)) {
            return [
                'error' => 'This Pharmacy Not Found'
            ];
        }

        return [
            'message'  => 'Fetched Successfully',
            'pharmacy' => $pharmacy
        ];

    }

    public function updatePharmacy($data)
    {
        $pharmacy=$this->pharmacyRepository->getPharmacyById($data['id']);

        if (!isset($pharmacy)) {
            return [
                'error' => 'This Pharmacy Not Found'
            ];
        }

        $pharmacyUpdated=$this->pharmacyRepository->update($data);

        if($pharmacyUpdated==0)
        {
            return [
                'error' => 'Error In Updating'
            ];
        }

        return [
            'message'=>'Updated Successfully',
            'pharmacy'=>$pharmacy
        ];
    }

    public function deletePharmacy($pharmacyId)
    {
        $pharmacy=$this->pharmacyRepository->getPharmacyById($pharmacyId);

        if(!isset($pharmacy))
        {
            return [
                'error' => 'This Pharmacy Not Found'
            ];
        }

        $pharmacyDeleted=$this->pharmacyRepository->delete($pharmacyId);

        if($pharmacyDeleted==0)
        {
            return [
                'error'=>'Error In Deleting'
            ];
        }

        return [
            'message'=>'Deleted Successfully'
        ];
    }


    public function showProductInPharmacy($pharmacyId)
    {
        $productInPharmacy=$this->pharmacyRepository->showProductInPharmacy($pharmacyId);

        return
        [
            'message'=>'Fetched Successfully',
            'products'=>$productInPharmacy
        ];
    }
}
