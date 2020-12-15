<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Category;
use App\Models\Store;
use App\Models\User;
use App\Traits\Uploadable;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    use Uploadable;

    public function index()
    {
        $store = auth()->user()->store;
        return view('store.stores.show', compact('store'));
    }


    public function create()
    {
//        $categories = Category::all();
//        $users = User::all();
//        return view('dashboard.stores.create', compact('categories', 'users'));
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            $path = $this->uploadOne($request['image'], 'stores', null, null);
            $data['image'] = $path;
        }
        Store::create($data);

        return back()->with('success', trans('dashboard.store.created successfully'));
    }


    public function show(Store $store)
    {
        $store->load('menus.translation');
        return view('store.stores.show', compact('store'));
    }


    public function edit(Store $store)
    {
//        $categories = Category::all();
//
//        return view('dashboard.stores.edit', compact('store', 'categories'));
    }


    public function update(UpdateStoreRequest $request, Store $store)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $path = $this->uploadOne($request['image'], 'stores', null, null);
            $data['image'] = $path;
        }

        $store->update($data);

        return redirect()->route('category.show', $store->category_id)
            ->with('success', trans('dashboard.store.updated successfully'));
    }


    public function destroy(Store $store)
    {
        if ($store->menus()->count() > 0) {
            return back()->with('error', trans('dashboard.store.has menus'));
        }
        $store->delete();

        return back()->with('success', trans('dashboard.store.deleted successfully'));
    }
}
