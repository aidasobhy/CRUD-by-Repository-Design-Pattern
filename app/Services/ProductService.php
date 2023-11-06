<?php

namespace App\Services;

use App\Helpers\imageHelper;
use App\Helpers\TransFormHelper;
use App\Repositories\IProduct;

class ProductService
{

    public $productRepository;
    public function __construct(IProduct $productRepository)
    {
        $this->productRepository=$productRepository;
    }

    public function getAllProducts($searchProduct)
    {
        $products = $this->productRepository->getAllProducts($searchProduct);

        return [
            'message'  => 'Fetched Successfully',
            'products' => $products
        ];
    }

    public function createProduct($data, $request)
    {
        if ($request->has('product_image')) {
            $image                 = $request->file('product_image');
            $data['product_image'] = imageHelper::uploadImage('products', $image);
        }

        $productObj = $this->productRepository->create($data);

        return [
            'message' => 'Created Successfully',
            'product' => $productObj
        ];
    }

    public function getProductById($productId)
    {
        $product = $this->productRepository->getProductById($productId);

        if (!isset($product)) {
            return [
                'error' => 'This Product Not Found'
            ];
        }

        return [
            'success' => 'Fetched Successfully',
            'product' => $product
        ];

    }


    public function getProductDetails($productId)
    {
        $product        = $this->productRepository->getProductById($productId);
        $productDetails = $this->productRepository->getProductDetails($productId);
        return [
            'message'        => 'Fetched Successfully',
            'product'        => $product,
            'productDetails' => $productDetails
        ];
    }

    public function update($data)
    {
        $product = $this->productRepository->getProductById($data['id']);
        if (!isset($product)) {
            return [
                'error' => 'This Product Not Found'
            ];
        }

        $productUpdated = $this->productRepository->update($data);

        if ($productUpdated == 0) {
            return [
                'error' => 'Error in updating'
            ];
        }

        return [
            'message' => 'Updated Successfully',
            'product' => $product
        ];
    }

    public function delete($productId)
    {
        $product = $this->productRepository->getProductById($productId);

        if (!isset($product)) {
            return [
                'error' => 'This Product Not Found'
            ];
        }


        if ($product->product_image != null) {
            unlink('assets/images/products/' . $product->product_image);
        }
        $productDeleted = $this->productRepository->delete($productId);

        if ($productDeleted == 0) {
            return [
                'error' => 'Error in Deleting'
            ];
        }

        return [
            'message' => 'Deleted Successfully',
        ];
    }



}
