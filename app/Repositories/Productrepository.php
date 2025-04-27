<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductInterface;

class Productrepository implements ProductInterface
{

    public function index($request)
    {
        return Product::when($request->filled('status'), function ($q) use ($request) {
            $q->where('status', $request->status);
        })->when($request->filled('filter_user'), function ($q) use ($request) {
            $q->where('user_id', $request->filter_user);
        })
            ->when($request->filled('filter_date'), function ($q) use ($request) {
                $q->whereDate('created_at', $request->filter_date);
            })
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('price', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('barcode', 'LIKE', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(30);
    }
    public function show($id)
    {
        return Product::findOrFail($id);
    }
    public function create() {}
    public function store($data)
    {
        return Product::create($data);
    }

    public function edit($id)
    {
        return Product::findOrFail($id);
    }
    public function update($data, $id)
    {
        return Product::findOrFail($id)->update($data);
    }
    public function destroy($id)
    {
        return Product::findOrFail($id)->delete();
    }
    public function bulkDelete($ids)
    {
        return Product::whereIn('id', $ids)->delete();
    }
}