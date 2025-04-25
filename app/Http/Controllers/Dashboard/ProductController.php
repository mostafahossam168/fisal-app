<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Interfaces\ProductInterface;

class ProductController extends Controller
{

    public $item;
    public function __construct(ProductInterface $item)
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
        return view('dashboard.products.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $data['image'] = store_file($request->image, 'products');
        $this->item->store($data);
        return   redirect()->route('products.index')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = $this->item->show($id);
        return view('dashboard.products.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = $this->item->edit($id);
        return view('dashboard.products.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $item = $this->item->show($id);
        $data = $request->validated();
        if ($request->image) {
            delete_file($item->image);
            $data['image'] = store_file($request->image, 'products');
        } else {
            unset($data['image']);
        }
        $this->item->update($data, $id);
        return   redirect()->route('products.index')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = $this->item->show($id);
        delete_file($item->image);
        $this->item->destroy($id);
        return   redirect()->route('products.index')->with('success', 'تم حفظ البيانات بنجاح');
    }
}