<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('site.products.index', compact('products'));
    }

    public function show(Product $product) {

        return view('site.products.show', compact('product'));
    }

    public function create()
    {
        return view('site.products.create');
    }

    public function store(ProductRequest $request)
    {

        $product = Product::create($request->validated());

        // session()->flash('success', 'stored successfully');

        return redirect()->back()->with('success', 'stored successfully');
    }

    public function edit(Product $product)
    {
        return view('site.products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.index')->with('success', 'Updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
