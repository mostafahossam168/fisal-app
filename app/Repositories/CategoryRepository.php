<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    public function index($request)
    {
        return Category::when($request->filled('status'), function ($q) use ($request) {
            $q->where('status', $request->status);
        })->where(function ($q) use ($request) {
            if ($request->search) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            }
        })->orderBy('id', 'DESC')->paginate(30);
    }
    public function store($data)
    {
        return Category::create($data);
    }
    public function update($data, $id)
    {
        return Category::find($id)->update($data);
    }
    public function destroy($id)
    {
        return Category::find($id)->delete();
    }
}
