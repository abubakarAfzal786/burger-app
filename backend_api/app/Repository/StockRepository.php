<?php

namespace App\Repository;

use App\Models\Stock;
use App\Repository\Repository;

class StockRepository extends Repository
{
  //protected $entity = Stock::class;
  function getModelClassName()
  {
    return  Stock::class;
  }
  public function fetchStock($ids)
  {
    return Stock::whereIN('id', $ids);
  }
  public function fetchAll()
  {
    return parent::all();
  }
  public function updateStock($value, $id)
  {

    $stock = Stock::find($id);
    $stock->update($value);
    return $stock;
  }
  public function updateAlert($ids)
  {

    return Stock::whereIN('id', $ids)->update(['send_alert' => 1]);
  }
}
