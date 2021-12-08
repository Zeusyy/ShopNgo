<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();

        return view('product.index')->with('products',$products);
        // return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
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
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->display = $request->display;
        $product->os = $request->os;
        $product->bcam = $request->bcam;
        $product->fcam = $request->fcam;
        $product->cpu = $request->cpu;
        $product->ram = $request->ram;
        $product->rom = $request->rom;
        $product->sim = $request->sim;
        $product->battery = $request->battery;
        $product->image = $request->image;

        $product->save();

        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('product.detail')
        ->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('product.edit')
        ->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->display = $request->display;
        $product->os = $request->os;
        $product->bcam = $request->bcam;
        $product->fcam = $request->fcam;
        $product->cpu = $request->cpu;
        $product->ram = $request->ram;
        $product->rom = $request->rom;
        $product->sim = $request->sim;
        $product->battery = $request->battery;
        $product->image = $request->image;

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('product.index');
    }
}
