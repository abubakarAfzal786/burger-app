<?php

namespace App\Http\Controllers;

use App\BusinessLogicLayer\IngredientManager;
use App\BusinessLogicLayer\OrderManager;
use App\BusinessLogicLayer\StockManager;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderManager;
    protected $ingredientManager;
    protected $stockManager;
    public function __construct(OrderManager $orderManager, IngredientManager $ingredientManager, StockManager $stockManager)
    {
        $this->orderManager = $orderManager;
        $this->ingredientManager = $ingredientManager;
        $this->stockManager = $stockManager;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $orders = $this->orderManager->fetchAll();
            return response()->json(array('orders' => $orders));
        } catch (Exception $e) {
            return response()->json(array('error' => $e->getMessage()));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {

        try {
            $response = [];
            $error = 'success';
            foreach ($request->products as $index => $product) {
                $orders = $this->orderManager->placeOrder($product['product_id'], $product['quantity']);
                if ($orders) {
                    array_push($response, ['order' => $index, 'message' => 'success']);
                } else {
                    $error = 'error';
                    array_push($response, ['message' => 'insufficient Stock', 'order' => $index]);
                }
            }
            return response()->json(array('orders' => $response, 'message' => $error));
        } catch (Exception $e) {
            return response()->json(array('error' => $e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
