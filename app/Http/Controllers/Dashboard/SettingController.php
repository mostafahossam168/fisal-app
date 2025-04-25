<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use anlutro\LaravelSettings\Facades\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    public function index()
    {
        $items = Setting::all();
        return view('dashboard.settings', compact('items'));
    }
    public function update(Request $request)
    {
        $data =   $request->validate([
            "website_name" => "required",
            "apple" => "required",
            "android" => "required",
        ]);

        \DB::table('settings')->delete();
        setting($data)->save();
        return   redirect()->back()->with('success', 'تم حفظ البيانات بنجاح');
    }



    // public function show()
    // {
    //     return Setting::all();
    // }
    // public function update($request, $files)
    // {
    //     $data = $request;

    //     $current = ['logo', 'fav'];

    //     foreach ($files as $file => $value) {
    //         if (!empty(setting($file))) {
    //             delete_file(setting($file));
    //         }
    //         $data[$file] = store_file($value, 'settings');
    //     }

    //     if (empty($files)) {
    //         foreach ($current as $ele) {
    //             $data[$ele] = setting($ele);
    //         }
    //     }

    //     \DB::table('settings')->delete();
    //     return   setting($data)->save();
    // }
}