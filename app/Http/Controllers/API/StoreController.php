<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    use ApiTrait;
    public function index($id)
    {
        $category = Category::find($id);

        $stores = $category->stores;

        return $this->returnData($stores);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $store = Store::find($id)->load('menus.translations', 'translation');

        return $this->returnData($store);
    }

    public function update(Request $request, Store $store)
    {
        //
    }

    public function destroy(Store $store)
    {
        //
    }
}
