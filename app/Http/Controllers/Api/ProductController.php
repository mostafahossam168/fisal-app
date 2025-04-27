<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Interfaces\ProductInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponse;
    public  $itemRepository;
    public function __construct(ProductInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }
    public function index(Request $request)
    {
        $data = $this->itemRepository->index($request);
        return $this->returnData(ProductResource::collection($data), null, $this->make_pagination($data));
    }
    public function  show($id)
    {
        $data = $this->itemRepository->show($id);
        return $this->returnData(new ProductResource($data));
    }
}