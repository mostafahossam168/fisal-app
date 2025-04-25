<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Interfaces\AdminInterface;
// use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{

    public $item;
    public function __construct(AdminInterface $item)
    {
        $this->item = $item;
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = $this->item->index($request);
        return view('dashboard.admins.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 'admin';
        $data['password'] = bcrypt($request->password);
        $data['image'] = $request->image ? store_file($request->image, 'admins') : null;
        $this->item->store($data);
        return   redirect()->route('admins.index')->with('success', 'تم انشاء مشرف جديد بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = $this->item->edit($id);
        return view('dashboard.admins.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $data = $request->validated();
        $item = $this->item->show($id);
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }
        if ($request->image) {
            delete_file($item->image);
            $data['image'] =  store_file($request->image, 'admins');
        } else {
            unset($data['image']);
        }
        $this->item->update($data, $id);
        return   redirect()->route('admins.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = $this->item->show($id);
        delete_file($item->image);
        $this->item->destroy($id);
        return   redirect()->route('admins.index')->with('success', 'تم حذف  المشرف بنجاح');
    }
}
