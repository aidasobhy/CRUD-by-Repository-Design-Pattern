<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService=$productService;
    }

    public function index()
    {
        $searchProduct=null;
        if(isset($_GET['search']))
        {
            $searchProduct=$_GET['search'];
        }

        $response=$this->productService->getAllProducts($searchProduct);

        $products=$response['products'];

        return view('site.products.index',compact('products'));

    }

    public function create()
    {
       return view('site.products.create');
    }

    public function store(ProductRequest $request)
    {
       $data=$request->validated();
       $productObj=$this->productService->createProduct($data,$request);
       session()->flash('success',$productObj['message']);
       return redirect()->route('products.all');
    }

    public function edit($productId)
    {
        $response=$this->productService->getProductById($productId);
        $product=$response['product'];

        if (isset($product['error'])) {
            session()->flash('error', $product['error']);
            return redirect()->route('products.all');
        }

        return view('site.products.edit',compact('product'));
    }

    public function update(UpdateProductRequest $request, $productId)
    {
        $data       = $request->validated();
        $data['id'] = $productId;
        $product    = $this->productService->update($data);
        if (isset($product['error'])) {
            session()->flash('error', $product['error']);
            return redirect()->route('products.all');
        }

        session()->flash('success', $product['message']);
        return redirect()->route('products.all');
    }

    public function delete($productId)
    {
        $product=$this->productService->delete($productId);

        if(isset($productId['error']))
        {
            session()->flash('error', $product['error']);
            return redirect()->route('products.all');
        }

        session()->flash('success', $product['message']);
        return redirect()->route('products.all');
    }

    public function getProductDetails($productId)
    {
        $response=$this->productService->getProductDetails($productId);
        $product=$response['product'];
        $productDetails=$response['productDetails'];
        return view('site.products.show_details',compact('product','productDetails'));
    }
}
