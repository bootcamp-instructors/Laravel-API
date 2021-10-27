<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        return Order::all();
    }

    /**
     * Display a listing of the resource by user_id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsersOrders(Request $request)
    {
        // get all orders from a specific user
        return Order::where('user_id', $request->user()->id)->get();
    }

    public function current(Request $request)
    {
        $id = $request->user()->id;
        $currentOrder = Order::where('user_id', $id)->where('order_placed_at', null)->get();
        if (count($currentOrder) == 0) {
            $order = $this->create($id);
            $currentOrder = Order::find($order->id)->get();
        }
        return $currentOrder;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        $order = new Order;

        $order->order_placed_at = null;
        $order->shipping_id = 2; // all orders are set to have the second shipping option as default
        $order->user_id = $user_id;

        $order->save();

        return $order;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function purchase(Request $request)
    {
        $order = Order::find($request->order_id)->get();
        $order->order_placed_at = now();
        $order->shipping_id = $request->shipping_id;
        $order->save();
        return "Order Created";
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
