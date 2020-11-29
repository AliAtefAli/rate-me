<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;
use App\Models\User;
use App\Traits\Uploadable;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    use Uploadable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('dashboard.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('dashboard.stores.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $store = Store::create($request->all());

        if ($store) {
            session()->flash('success', 'تم اضافة المتجر بنجاح');
        } else {
            session()->flash('error', 'لم يتم اضافة المتجر من فضلك اعد مرة اخري');
        }

        return redirect()->route('store.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('dashboard.stores.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $categories = Category::all();
        return view('dashboard.stores.edit', compact('store', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        // dd($store, $request->all());
        if ($request->has('image')) {
            $path = $this->uploadOne($request['image'], 'stores', null, null);
            $store->image = $path;
            $store->save();
        }
        $updated = $store->update($request->all());

        if ($updated) {
            session()->flash('success', 'تم تعديل بيانات المتجر بنجاح');
        } else {
            session()->flash('error', 'لم يتم تعديل هذا المتجر من فضلك اعد مرة اخري');
        }

        return redirect()->route('store.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $deleted = $store->delete();

        if ($deleted) {
            session()->flash('success', 'تم حذف المتجر بنجاح');
        } else {
            session()->flash('error', 'لم يتم حذف هذا المتجر من فضلك اعد مرة اخري');
        }

        return redirect()->route('store.index');
    }
}
