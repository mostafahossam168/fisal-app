<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\AdminInterface;

class AdminRepository implements AdminInterface
{

    public function index($request)
    {
        return User::admins()->when($request->filled('status'), function ($q) use ($request) {
            $q->where('status', $request->status);
        })
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('phone', 'LIKE', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(30);
    }
    public function show($id)
    {
        return User::findOrFail($id);
    }
    public function create() {}
    public function store($data)
    {
        return User::create($data);
    }
    public function edit($id)
    {
        return User::findOrFail($id);
    }
    public function update($data, $id)
    {
        return User::findOrFail($id)->update($data);
    }
    public function destroy($id)
    {
        return User::findOrFail($id)->delete();
    }
}