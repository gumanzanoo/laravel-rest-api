<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Store $store)
    {
        $products = $store->load('products');

        return response()->json($products);
    }

    public function store(ProductFormRequest $request, Store $store)
    {
        $validated = $request->validated();

        $store->products()
            ->updateOrCreate([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'price' => $validated['price'],
                'store_id' => $store->id
            ]);


        return $store->products()->latest()->first();
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
