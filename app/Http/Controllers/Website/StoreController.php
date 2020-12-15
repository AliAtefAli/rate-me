<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        //
    }

    public function show(Store $store)
    {
        return view('site.stores.show', compact('store'));
    }

    public function showMenu($id)
    {
        $store = Store::find($id);
        $store->load('menus.translation');

        return view('site.menus.show', compact('store'));
    }
}
