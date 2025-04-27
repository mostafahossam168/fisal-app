<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthAdminRequest;

class AuthController extends Controller
{
    use ApiResponse;
    public function login(AuthAdminRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = auth()->user();
            $data = [
                'user' => new UserResource($user),
                'token' => $user->createToken('authToken')->plainTextToken,
            ];
            return $this->returnData($data, 'تم تسجيل الدخول بنجاح');
        }
        return $this->returnError('البيانات غير صحيحة');
    }





    public function profile(Request $request)
    {
        $data = auth()->user();
        return $this->returnData(new UserResource($data));
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->returnSuccessMessage('تم تسجيل الخروج');
    }
}