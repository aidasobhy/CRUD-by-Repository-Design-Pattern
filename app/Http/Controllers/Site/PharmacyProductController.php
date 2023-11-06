<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\PharmacyProductRequest;
use App\Http\Requests\UpdatePharmacyProductRequest;
use App\Services\PharmacyProductService;

class PharmacyProductController extends Controller
{
  public $pharmacyProductService;

  public function __construct(PharmacyProductService $pharmacyProductService)
  {
      $this->pharmacyProductService=$pharmacyProductService;
  }

    public function searchProductSelect2()
    {
        $data     = [];
        $key      = $_GET['product_name'];
        $products = $this->pharmacyProductService->searchPharmacyProduct($key);

        if (isset($products['products']) && count($products['products']) > 0) {
            foreach ($products['products'] as $product) {
                $data[] = [
                    "id"   => $product->id,
                    "text" => $product->product_title
                ];
            }
        }

        $searchProduct = json_encode($data);
        return $searchProduct;
    }

    public function addProductToPharmacy($pharmacyId)
    {
        return view('site.pharmacies.addProduct', compact('pharmacyId'));
    }

    public function storeProductToPharmacy(PharmacyProductRequest $request,$pharmacyId)

    {
          $data=$request->validated();
          $data['pharmacy_id']=$pharmacyId;
          $product=$this->pharmacyProductService->createProductInPharmacy($data);
          session()->flash('success',$product['message']);
          return redirect()->route('show.products.inPharmacy',$pharmacyId);
    }

    public function editProductInPharmacy($productIdInPharmacy)
    {
      $response=$this->pharmacyProductService->getProductIdInPharmacy($productIdInPharmacy);
    }


}
