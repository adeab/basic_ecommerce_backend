<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\ProductOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $neworder = new Order;
        $neworder->user_id = auth()->user()->id;
        $neworder->total = 0;
        $neworder->order_status = "Pending";
        $neworder->save();
        
        $totalPrice = 0;
        
        //populating productOrder table for each product and adding each product price to total price
        foreach ($request->products as $product) {
            
            $product_order = new ProductOrder;
            $product_order->product_id = json_decode(json_encode($product))->product_id;
            $product_order->order_id = $neworder->id;
            $current_product = Product::find(json_decode(json_encode($product))->product_id);
            $product_order->product_price = $current_product->price;
            $product_order->quantity = json_decode(json_encode($product))->quantity;
            $totalPrice+=$current_product->price*json_decode(json_encode($product))->quantity;
            $product_order->save();
            
        }

        $current_order = Order::where('id', $neworder->id)->with('product_orders')->get()->first();
        $current_order->total = $totalPrice;
        $current_order->update();

        return $current_order;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
