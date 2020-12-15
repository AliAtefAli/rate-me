<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Store;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    use ApiTrait;
    public function index($id)
    {
        $store = Store::find($id);

        return $this->returnData($store);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $menu = Menu::find($id)->load('products.translations', 'translation');

        return $this->returnData($menu);
    }

    public function update(Request $request, Menu $menu)
    {
        //
    }

    public function destroy(Menu $menu)
    {
        //
    }
}
