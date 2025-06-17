<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;
use Illuminate\Routing\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;

class HomeController extends Controller
{
    use ApiResponse;
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        $data = Product::latest()->take(6)->get();
        return $this->returnData(ProductResource::collection($data));
    }
}