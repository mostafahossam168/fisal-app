<?php

namespace App\Models;

use App\Enum\StatusProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $guarded = [];

    public $casts = [
        'status' => StatusProduct::class,
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
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