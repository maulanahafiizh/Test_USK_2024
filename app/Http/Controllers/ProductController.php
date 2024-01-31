<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all()->count();
        $allProducts = Product::all();

        return view('models.product.product-index', compact('product', 'allProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('models.product.product-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'first_stock' => $request->stock,
            'last_stock' => $request->stock,
        ]);

        if ($product) {
            return redirect()->route('product.index')->with('status', 'Berhasil menambah data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('models.product.product-show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('models.product.product-edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'first_stock' => 0,
            'last_stock' => 0,
        ]);

        $product->update($request->all());

        $product->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'first_stock' => $request->stock,
            'last_stock' => $request->stock,
        ]);

        if ($product) {
            return redirect()->route('product.index')->with('status', 'Berhasil mengedit data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('status', 'Berhasil menghapus data');
    }
}
