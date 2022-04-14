<?php

namespace App\Repository;

use App\Models\Ingredient;
use App\Repository\Repository;

class IngredientRepository extends Repository
{
  //protected $entity = Ingredient::class;
  function getModelClassName()
  {
    return  Ingredient::class;
  }
  public function fetchAll($id)
  {
    return parent::allWhere(['product_id' => $id]);
  }
}
