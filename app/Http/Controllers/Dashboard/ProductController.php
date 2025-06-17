<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\ProductEvent;
use Illuminate\Http\Request;
use App\Imports\ImportProduct;
use App\Imports\ProductImport;
use Illuminate\Routing\Controller;
use App\Interfaces\ProductInterface;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProductRequest;
use App\Mail\NewProductMail;
use Illuminate\Support\Facades\Mail;

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


    public function excelProduct(Request $request)
    {
        $fields = $request->validate([
            'excel' => ['required', 'mimes:xlsx,csv'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        // $request->validate()

        Excel::import(new ProductImport($fields['user_id']), $request->file('excel'));

        return   redirect()->route('products.index')->with('success', 'تم حفظ البيانات بنجاح');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->image ? store_file($request->image, 'products') : null;
        $data['certificate'] = $request->certificate ? store_file($request->certificate, 'certificates') : null;
        $product = $this->item->store($data);
        // Mail::to($product->user->email)->send(new NewProductMail($product));
        // event(new ProductEvent($product));
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
            if ($item->image) {
                delete_file($item->image);
            }
            $data['image'] = store_file($request->image, 'products');
        } else {
            unset($data['image']);
        }
        if ($request->certificate) {
            if ($item->certificate) {
                delete_file($item->certificate);
            }
            $data['certificate'] = store_file($request->certificate, 'certificates');
        } else {
            unset($data['certificate']);
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
        if ($item->image) {
            delete_file($item->image);
        }
        if ($item->certificate) {
            delete_file($item->certificate);
        }
        $this->item->destroy($id);
        return   redirect()->route('products.index')->with('success', 'تم حفظ البيانات بنجاح');
    }


    public function bulkDelete(Request $request)
    {
        // return $request->ids;
        $ids = explode(',', $request->ids);

        $this->item->bulkDelete($ids);

        return redirect()->route('products.index')->with('success', 'تم حذف المنتجات  بنجاح');
    }
}
