<?php



use Illuminate\Support\Facades\Storage;

function store_file($file, $path)
{
    $name = time() . $file->getClientOriginalName();
    return $value = $file->storeAs($path, $name, 'uploads');
}
function delete_file($file)
{
    if ($file != '' and !is_null($file) and Storage::disk('uploads')->exists($file)) {
        unlink('uploads/' . $file);
    }
}

function display_file($name)
{
    return asset('uploads') . '/' . $name;
}

if (!function_exists('getRouterValue')) {
    function getRouterValue()
    {

        if (config('app.env') === 'production') {

            $__getRoutingValue = '/cork/laravel/rtl/vertical-light-menu/';
        } else if (config('app.env') === 'pre_production') {

            $__getRoutingValue = '/cork/laravel_cork_4/rtl/vertical-light-menu/';
        } else {

            $__getRoutingValue = '/';
        }


        return $__getRoutingValue;
    }
}
