<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ApiResponse;
    public function index()
    {
        return $this->returnData([
            'apple' => setting('apple'),
            'android' => setting('android'),
        ]);
    }
}