<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\PharmacyRequest;
use App\Services\PharmacyService;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    use Response;

    public $pharmacyService;

    public function __construct(PharmacyService $pharmacyService)
    {
        $this->pharmacyService=$pharmacyService;
    }

    public function index()
    {
        $pharmacies=$this->pharmacyService->getAllPharmacies();

        return $this->returnData($pharmacies['pharmacies'],
            $pharmacies['message'],
            200
        );
    }

    public function create(PharmacyRequest $request)
    {
        $data=$request->validated();
        $pharmacy=$this->pharmacyService->createPharmacy($data);

        return $this->returnData(
            $pharmacy['pharmacy'],
            $pharmacy['message'],
            200
        );
    }

    public function update(PharmacyRequest $request,$pharmacyId)
    {
        $data=$request->validated();
        $data['id']=$pharmacyId;
        $pharmacyUpdated=$this->pharmacyService->updatePharmacy($data);

        if(isset($pharmacyUpdated['error']))
        {
            return $this->returnError($pharmacyUpdated['error'],404);
        }

        return  $this->returnSuccessMessage($pharmacyUpdated['message'],200);
    }

    public function delete($pharmacyId)
    {
        $pharmacyDeleted=$this->pharmacyService->deletePharmacy($pharmacyId);

        if(isset($pharmacyDeleted['error']))
        {
            return $this->returnError($pharmacyDeleted['error'],404);
        }

        return $this->returnSuccessMessage($pharmacyDeleted['message'],200);
    }

    public function showProductsInPharmacy($pharmacyId)
    {
        $products=$this->pharmacyService->showProductInPharmacy($pharmacyId);


        return $this->returnData($products['products'],$products['message'],200);

    }
}
