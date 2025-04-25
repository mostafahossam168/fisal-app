<?php

namespace App\Interfaces;

interface UserInterface
{
    public function index($request);
    public function show($id);
    public function create();
    public function store($data);
    public function edit($id);
    public function update($data, $id);
    public function destroy($id);
}
