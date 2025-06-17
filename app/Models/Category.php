<?php

namespace App\Models;

use App\Enum\CategoryStatus;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $guarded = [];

    public $casts = [
        'status' => CategoryStatus::class,
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function ScopeActive($query)
    {
        $query->where('status', 1);
    }
    public function ScopeInActive($query)
    {
        $query->where('status', 0);
    }
}
