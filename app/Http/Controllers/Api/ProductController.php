<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProduct;
use App\Http\Requests\UpdateProduct;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Store $store, Request $request)
    {
        $perPage = $request->perPage ?? 10;

        return $store->products()
            ->paginate($perPage);
    }

    public function store(CreateProduct $request, Store $store)
    {
        $validated = $request->validated();

        $store->products()
            ->updateOrCreate([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'price' => $validated['price']
            ]);

        return $store->products()->latest()->first();
    }

    public function show($id, Product $product)
    {
        return $product::whereStoreId($id)->first();
    }

    public function update(UpdateProduct $request, Store $store, $id)
    {
        $validated = $request->validated();

        $store->products()->whereId($id)
            ->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'price' => $validated['price']
            ]);

        return $store->products()->latest()->first();
    }

    public function destroy(Store $store, $id)
    {
        $store->products()->find($id)->delete();

        return response("Product deleted.", 200);
    }
}
