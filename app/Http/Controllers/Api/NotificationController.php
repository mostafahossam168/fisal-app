<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificateResource;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $data = auth()->user()->messages()->paginate(30);
        return $this->returnData(NotificateResource::collection($data), null, $this->make_pagination($data));
    }
}