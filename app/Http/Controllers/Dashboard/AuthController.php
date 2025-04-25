<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\AuthAdminRequest;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->only(['logout', 'profile', 'updateProfile']);
    }
    public function login(AuthAdminRequest $request)
    {
        $data =  $request->validated();
        if (auth()->attempt($data)) {
            return redirect()->route('home')->with('success', 'تم تسجيل الدخول بنجاح');
        }
        return redirect()->back()->with('error', 'البيانات غير صحيحه');
    }




    public function profile()
    {
        $item = auth()->user();
        return view('dashboard.auth.profile', compact('item'));
    }
    public function updateProfile(AuthAdminRequest $request)
    {
        $data = $request->validated();
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->image) {
            delete_file(auth()->user()->image);
            $data['image'] =  store_file($request->image, 'admins');
        } else {
            unset($data['image']);
        }
        auth()->user()->update($data);
        return   redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.form')->with('success', 'تم تسجيل الخروج بنجاح');
    }
}