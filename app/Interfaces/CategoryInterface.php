<?php

namespace App\Interfaces;

interface CategoryInterface
{
    public function index($request);
    public function store($data);
    public function update($data, $id);
    public function destroy($id);
}
