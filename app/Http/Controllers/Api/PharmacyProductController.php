<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\PharmacyProductRequest;
use App\Services\PharmacyProductService;
use Illuminate\Http\Request;

class PharmacyProductController extends Controller
{
    use Response;
    public $pharmacyProductService;

    public function __construct(PharmacyProductService $pharmacyProductService)
    {
        $this->pharmacyProductService=$pharmacyProductService;
    }

    public function addProductToPharmacy(PharmacyProductRequest $request,$pharmacyId)
   {
         $data=$request->validated();
         $data['pharmacy_id']=$pharmacyId;
         $product=$this->pharmacyProductService->createProductInPharmacy($data);
         return $this->returnData($product['product'],$product['message'],200);
   }

  public function getDataSelect2()
  {
      if(!isset($_GET['product_title']))
      {
          return $this->returnError('Please Enter Product Name to search it',
              \Illuminate\Http\Response::HTTP_BAD_REQUEST);
      }

      $key=$_GET['product_title'];
      $products=$this->pharmacyProductService->searchPharmacyProduct($key);
      $data=[];

      if(isset($products['products']) && count($products['products']) >0)
      {
          foreach ($products['products'] as $product)
          {
              $data[]=[
                  'id'=>$product->id,
                  'product_title'=>$product->product_title
              ];
          }
      }
      else
      {
          $data=['msg'=>'No Data Founded'];
      }

      return $this->returnData($data,"","");
  }

}
