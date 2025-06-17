<?php

namespace App\Interfaces;

interface ProductInterface
{
    public function index($request);
    public function show($id);
    public function create();
    public function store($data);
    public function edit($id);
    public function update($data, $id);
    public function destroy($id);
    public function bulkDelete($ids);
}
