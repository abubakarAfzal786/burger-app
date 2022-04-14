<?php


namespace App\BusinessLogicLayer;

use App\Jobs\SendEmailJob;
use App\Models\Product;
use App\Repository\IngredientRepository;
use App\Repository\StockRepository;

class StockManager
{

    protected $stockRepository;
    protected $ingredients;
    protected $stocks;
    public function __construct(StockRepository $stockRepository)
    {

        $this->stockRepository = $stockRepository;
    }

    /**
     * @param ingredients array
     * Return true if the Stock is Available and False if not
     * @return  Boolean
     */
    public function checkStock($ingredients)
    {

        $stock = $this->stockRepository->fetchStock(array_keys($ingredients))->pluck('quantity', 'id')->toArray();  /// Fetch The Quantity of Stocks and pluck the id and quantity and the output of this query is an array in which index will be the id of stock and value the quantity of stock
        foreach ($ingredients as $index => $ingredient) {
            if ($stock[$index] < $ingredient) {
                return false;
            }
        }
        $this->stocks = $stock;
        $this->ingredients = $ingredients;
        return true;
    }
    /**
     * 
     * Update the Quantity of Each Stock
     * 
     */
    public function updateStock()
    {
        $ingredient_qty = $this->ingredients;
        $stocks = $this->stocks;
        foreach ($ingredient_qty as $stock_id => $ingredient) {
            $updated_stock =   $stocks[$stock_id] - $ingredient;
            $stock = $this->stockRepository->updateStock(['quantity' => $updated_stock], $stock_id);
            $this->sendAlert(array_keys($stocks), $stock->quantity * 100 / $stock->main_quantity, $stock->send_alert);
        }
    }
    /**
     * 
     * Send the email to Marchent and update the alert value in Database
     * 
     */
    public function fetchAll()
    {
        return $this->stockRepository->fetchAll()->pluck('quantity', 'id')->ToArray();
    }
    public function sendAlert($stock_ids, $percentage, $alert)
    {

        if ($percentage < 50 && $alert == false) {
            $this->stockRepository->updateAlert($stock_ids);
            dispatch(new SendEmailJob());
        }
    }
}
