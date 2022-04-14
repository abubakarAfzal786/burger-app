<?php


namespace App\BusinessLogicLayer;

use App\Models\Product;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use Exception;

class OrderManager
{

    protected $orderRepository;
    protected $ingredientManager;
    protected $stockManager;
    public function __construct(OrderRepository $orderRepository, IngredientManager $ingredientManager, StockManager $stockManager)
    {

        $this->orderRepository = $orderRepository;
        $this->ingredientManager = $ingredientManager;
        $this->stockManager = $stockManager;
    }

    /**
     * Fetch all Orders
     * @return Order
     */
    public function fetchAll()
    {
        return $this->orderRepository->fetchAll();
    }

    public function placeOrder($product_id, $quantity)
    {

        try {
            $fetch_ingredients_quantity = $this->ingredientManager->fetchIngredientQuantity($product_id, $quantity);  ///fetch the Quantity ingredients of Each Product
            $check_stock = $this->stockManager->checkStock($fetch_ingredients_quantity);  /// Check if the Stock is Available for Eeach ingredient
            if ($check_stock) {
                \DB::beginTransaction();
                $this->orderRepository->placeOrder($product_id, $quantity);
                $this->stockManager->updateStock();
                \DB::commit();
                return true;
            }
            return false;
        } catch (Exception $e) {
            \DB::rollBack();
            return false;
        }
    }
}
