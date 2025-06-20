<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductImport implements ToModel, WithStartRow
{

    public $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        return new Product([
            'user_id' => $this->user_id,
            'name' => $row[0],
            'barcode' => $row[1],
            'product_number' => $row[2],
            'category_id' => Category::where('name', $row[3])->first()->id ?? Category::first()->id,
            'status' => 1,
        ]);
    }
}