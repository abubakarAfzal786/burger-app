<?php


namespace App\BusinessLogicLayer;

use App\Models\Product;
use App\Repository\IngredientRepository;
use App\Repository\OrderRepository;

class IngredientManager
{

    protected $ingredientRepository;

    public function __construct(IngredientRepository $ingredientRepository)
    {

        $this->ingredientRepository = $ingredientRepository;
    }

    /**
     * @params product_id and Quantity
     * Map the Value of ingredient and the id of it's respective Stock
     * @return array
     */
    public function fetchIngredientQuantity($product_id, $quantity)
    {
        $ingredients =  $this->ingredientRepository->fetchAll($product_id)->pluck('quantity', 'stock_id')->toArray();
        return array_map(function ($ingredient) use ($quantity) { ///map the Quantity of ingredient and Stock Id..here Stock Id will be the index and ingredient Quantity as value
            return $ingredient * $quantity;
        }, $ingredients);
    }

    public function fetchAll($product_id)
    {
        return $this->ingredientRepository->fetchAll($product_id)->get();
    }
}
