<?php

namespace App\Repository;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repository\Repository;

class ProductRepository extends Repository
{
  //protected $entity = Product::class;
  function getModelClassName()
  {
    return  Product::class;
  }
  public function fetchAll()
  {
    return ProductResource::collection(Product::with(['ingredients', 'ingredients.stock'])->whereHas('ingredients')->get());
  }
}
