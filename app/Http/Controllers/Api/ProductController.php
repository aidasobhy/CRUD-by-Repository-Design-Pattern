<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Response;
   public $productService;

   public function __construct(ProductService $productService)
   {
       $this->productService=$productService;
   }

   public function index()
   {
      $searchProduct=null;

      if(!empty(request('search')))
      {
          $searchProduct=\request('search');
      }

      $products=$this->productService->getAllProducts($searchProduct);

      return $this->returnData($products['products'],$products['message'],200);
   }

   public function store(ProductRequest $request)
   {
       $data=$request->validated();
       $product=$this->productService->createProduct($data,$request);

       return $this->returnData($product['product'],$product['message'],200);
   }

   public function update(UpdateProductRequest $request,$productId)
   {
        $data=$request->validated();
        $data['id']=$productId;
        $productUpdated=$this->productService->update($data);

        if(isset($productUpdated['error']))
        {
            return $this->returnError($productUpdated['error'],404);
        }

       return $this->returnSuccessMessage($productUpdated['message'],200);

   }

   public function delete($productId)
   {
       $product=$this->productService->delete($productId);

       if(isset($product['error']))
       {
          return $this->returnError($productId['error'],
              \Illuminate\Http\Response::HTTP_NOT_FOUND);
       }

       return $this->returnSuccessMessage($product['message']
           ,\Illuminate\Http\Response::HTTP_OK);
   }

   public function getProductDetails($productId)
   {
       $product=$this->productService->getProductDetails($productId);

      return $this->returnData(
         [
             $product['product'],
             $product['productDetails']
         ],
          $product['message'],
          200
      );

   }
}
