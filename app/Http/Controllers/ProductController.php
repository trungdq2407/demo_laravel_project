<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(Request $request)
    {
            $product = Products::create($request->all());
            return redirect()->route('products.show');
    }
    public function show()
    {
        $products = Products::all();
        return view('client/products', compact('products'));
    }
    public function editProduct($id)
    {
        $product = Products::find($id);
        return view('client/product-update', compact('product'));
    }
    public function updateProduct(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'thumbnail' => 'image'
        ]);
        $product = Products::find($id);

        if ($product) {
            $product->name = $validatedData['name'];
            $product->price = $validatedData['price'];
            if ($request->hasFile('thumbnail')) {
                // Handle thumbnail update
                $thumbnail = $request->file('thumbnail');
            }

            $product->save();
            return redirect()->route('products.show');
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function deleteProduct(Request $request)
    {
        $productId = $request->id;
        Products::destroy($productId);
        return redirect()->route('products.show');
    }
}
