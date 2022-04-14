<?php


namespace App\BusinessLogicLayer;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repository\ProductRepository;

class ProductManager
{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {

        $this->productRepository = $productRepository;
    }

    /**
     * Fetch all Products
     * @return Product
     */
    public function fetchAll()
    {
        return  $this->productRepository->fetchAll();
    }
}
