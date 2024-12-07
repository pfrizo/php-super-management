<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplier;
use App\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::with(['productDetail', 'supplier'])->paginate(10);


        return view('app.product.index', ['products' => $products, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        $suppliers = Supplier::all();

        return view('app.product.create', ['units' => $units, 'suppliers' => $suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:40',
            'description' => 'required|min:3|max:2000',
            'weight' => 'required|integer',
            'unit_id' => 'exists:units,id',
            'supplier_id' => 'exists:supplers,id'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido',
            'name.min' => 'O campo nome deve ter no mínimo 3 caratcteres',
            'name.max' => 'O campo nome deve ter no máximo 40 caratcteres',
            'description.min' => 'O campo descrição deve ter no mínimo 3 caratcteres',
            'description.max' => 'O campo descrição deve ter no máximo 2000 caratcteres',
            'weight.integer' => 'O campo peso deve ser um número inteiro',
            'unit_id.exists' => 'A unidade de medida informada não existe',
            'supplier_id.exists' => 'O fornecedor informado não existe' 
        ];

        $request->validate($rules, $feedback);

        Product::create($request->all());
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('app.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $units = Unit::all();
        $suppliers = Supplier::all();

        return view('app.product.edit', ['product' => $product, 'units' => $units, 'suppliers' => $suppliers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|min:3|max:40',
            'description' => 'required|min:3|max:2000',
            'weight' => 'required|integer',
            'unit_id' => 'exists:units,id',
            'supplier_id' => 'exists:supplers,id'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido',
            'name.min' => 'O campo nome deve ter no mínimo 3 caratcteres',
            'name.max' => 'O campo nome deve ter no máximo 40 caratcteres',
            'description.min' => 'O campo descrição deve ter no mínimo 3 caratcteres',
            'description.max' => 'O campo descrição deve ter no máximo 2000 caratcteres',
            'weight.integer' => 'O campo peso deve ser um número inteiro',
            'unit_id.exists' => 'A unidade de medida informada não existe',
            'supplier_id.exists' => 'O fornecedor informado não existe' 
        ];

        $request->validat($rules, $feedback);

        $product->update($request->all());
        return redirect()->route('product.show', ['product' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
