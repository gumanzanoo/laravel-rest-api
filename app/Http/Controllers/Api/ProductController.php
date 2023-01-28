<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProduct;
use App\Http\Requests\UpdateProduct;
use App\Models\Store;

class ProductController extends Controller
{
    public function index(Store $store)
    {
        return $store->load('products');
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

    public function show(Store $store, $id)
    {
        return $store->load(['products' => function ($query) use ($id) {
            $query->whereId($id);
        }]);
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
        return $store->products()->find($id)->delete();
    }
}
