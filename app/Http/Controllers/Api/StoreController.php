<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoresFormRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use Throwable;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::paginate(5);

        return response()->json($stores);
    }

    public function store(StoresFormRequest $request)
    {
        $validated = $request->validated();

        $store = Store::create([
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);

        return response()->json($store);
    }

    public function show(Store $store)
    {
        return response()->json($store);
    }

    public function update(StoresFormRequest $request, Store $store)
    {
        $validated = $request->validated();

        $store = $store::query()
            ->update([
                'name' => $validated['name'],
                'description' => $validated['description']
            ]);

        return response()->json($store);
    }

    public function destroy(Store $store)
    {
        $store::destroy();
    }
}
