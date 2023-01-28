<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStore;
use App\Http\Requests\UpdateStore;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        return Store::paginate(10);
    }

    public function store(CreateStore $request)
    {
        $validated = $request->validated();

        return Store::create([
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);
    }

    public function show(Store $store)
    {
        return $store;
    }

    public function update(UpdateStore $request, Store $store)
    {
        $validated = $request->validated();

        $store->update([
                'name' => $validated['name'],
                'description' => $validated['description']
            ]);

        return $store;
    }

    public function destroy(Store $store)
    {
        return $store->delete();
    }
}
