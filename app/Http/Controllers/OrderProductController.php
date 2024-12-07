<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;

class OrderProductController extends Controller
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
    public function create(Order $order)
    {
        $products = Product::all();

        return view('app.order_product.create', ['order' => $order, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $rules = [
            'product_id' => 'exists:products,id',
            'quantity' => 'required'
        ];

        $feedback = [
            'product_id.exists' => 'O produto informado não existe!',
            'quantity.required' => 'O campo quantidade deve possuir um valor válido'
        ];

        $request->validate($rules, $feedback);

        /*$orderProduct = new OrderProduct();
        $orderProduct->order_id = $order->id;
        $orderProduct->product_id = $request->get('product_id');
        $orderProduct->save();
        */

        //Cadastrar um produto por vez
        $order->products()->attach(
            $request->get('product_id'),
            ['quantity' => $request->get('quantity')]
        );
        
        /* Cadastrar vários produtos por vez, passando os valores no array associativo
        $order->products()->attach([
            $request->get('product_id') => ['quantity' => $request->get('quantity')]
        ]);
        */

        return redirect()->route('order-product.create', ['order' => $order->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function destroy(Order $order, Product $product)
    public function destroy(OrderProduct $orderProduct)
    {
        /*
        OrderProduct::where([
            'order_id' => $order->id,
            'product_id' => $product->id
        ])->delete();
        */

        //$order->products()->detach($product->id);

        $orderProduct->delete();

        return redirect()->route('order-product.create', ['order' => $orderProduct->order_id]);
    }
}
