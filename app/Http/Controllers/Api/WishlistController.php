<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WishlistController extends Controller
{
    use ApiResponse;
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        // return $request->user();
        $products = $request->user()->products()->paginate(30);
        return ProductResource::collection($products, null, $this->make_pagination($products));
    }
    public function addToWishlist(Request $request, $id)
    {
        if ($request->user()->products()->where('product_id', $id)->exists()) {
            return $this->returnError('المنتج موجود في المفضله');
        }
        $request->user()->products()->attach($id);
        return $this->returnSuccessMessage('تم اضافة المنتج للمفضله بنجاح');
    }
    public function removeWishlist(Request $request, $id)
    {
        if ($request->user()->products()->where('product_id', $id)->exists()) {
            $request->user()->products()->detach($id);
            return $this->returnSuccessMessage('تم حذف المنتج من المفضله بنجاح');
        }
        return $this->returnError('المنتج غير موجود في المفضله');
    }
}