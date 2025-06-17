<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\CategoryRequest;
use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public $item;
    public function __construct(CategoryInterface $item)
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
        return view('dashboard.categories.index', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $this->item->store($data);
        return   redirect()->back()->with('success', 'تم حفظ البيانات بنجاح');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request,  $id)
    {
        $data = $request->validated();
        $this->item->update($data, $id);
        return   redirect()->back()->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->item->destroy($id);
        return   redirect()->back()->with('success', 'تم حفظ البيانات بنجاح');
    }
}
