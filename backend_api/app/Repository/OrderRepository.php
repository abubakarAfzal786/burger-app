<?php

namespace App\Repository;

use App\Models\Order;
use App\Repository\Repository;

class OrderRepository extends Repository
{
  //protected $entity = Order::class;
  function getModelClassName()
  {
    return  Order::class;
  }
  public function fetchAll()
  {
    return parent::all('*', null, null, ['products']);
  }
  public function placeOrder($product_id, $quantity)
  {
    return parent::create(['product_id' => $product_id, 'quantity' => $quantity]);
  }
}
