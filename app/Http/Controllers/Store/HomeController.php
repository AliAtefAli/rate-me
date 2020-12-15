<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $store = auth()->user()->store;
        $menus = $store->menus;
        $productsCount = 0;
        foreach ($menus as $menu) {
            $productsCount += $menu->products->count();
        }

        return view('store.index', compact('productsCount', 'store'));
    }
}
