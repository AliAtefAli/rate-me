<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Store;
use App\Traits\Uploadable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use Uploadable;

    public function index()
    {
//        $products = Product::with('menu.translation','translation')
//            ->paginate(10);
//
//        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
//        $menus = Menu::all();
//        $stores = Store::all();
//
//        return view('dashboard.products.create', compact('menus', 'stores'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        if ($request->has('image')) {
            $path = $this->uploadOne($request['image'], 'products', null, null);
            $data['image'] = $path;
        }
        Product::create($data);

        return back()->with('success', trans('dashboard.product.created successfully'));
    }

    public function show(Product $product)
    {
        $store = auth()->user()->store;
        return view('store.products.show', compact('product', 'store'));
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->has('image')){
            if (file_exists(asset('assets/uploads/products/' . $product->image))) {
                unlink(asset('assets/uploads/products/' . $product->image));
            }
            $path = $this->uploadOne($request['image'], 'products', null, null);
            $data['image'] = $path;
        }
        $product->update($data);

        return back()->with('success', trans('dashboard.product.updated successfully'));
    }

    public function destroy(Product $product)
    {
        if ($product->additions()) {
            return back()->with('error', trans('dashboard.product.has additions'));
        }
        $product->delete();

        return back()->with('success', trans('dashboard.product.deleted successfully'));
    }

    public function delete(Request $request)
    {
        $ids = $request->ids;
        dd($request->all(),$ids);
        return response()->json(['success'=>"Products Deleted successfully." , 'ids' => $request->ids]);
//        $ids = $request->ids;
//        DB::table("products")->whereIn('id',explode(",",$ids))->delete();
//        return response()->json(['success'=>"Products Deleted successfully." , 'data' => $request->all()]);

    }
}
