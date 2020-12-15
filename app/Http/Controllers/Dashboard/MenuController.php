<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Store;
use App\Traits\Uploadable;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    use Uploadable;

    public function store(MenuRequest $request)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            $path = $this->uploadOne($request['image'], 'menus', null, null);
            $data['image'] = $path;
        }

        Menu::create($data);

        return back()->with('success', trans('dashboard.menu.created successfully'));
    }


    public function show(Menu $menu)
    {
        $menu->load('products.translations');

        return view('dashboard.menu.show', compact('menu'));
    }

    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $data = $request->validated();

        if ($request->has('image')){
            if (file_exists(asset('assets/uploads/menus/' . $menu->image))) {
                unlink(asset('assets/uploads/menus/' . $menu->image));
            }
            $path = $this->uploadOne($request['image'], 'menus', null, null);
            $data['image'] = $path;
        }
        $menu->update($data);

        return back()->with('success', trans('dashboard.menu.updated successfully'));
    }

    public function destroy(Menu $menu)
    {
        if ($menu->products()->count() > 0) {
            return back()->with('error', trans('dashboard.menu.has products'));
        }
        $menu->delete();

        return back()->with('success', trans('dashboard.menu.deleted successfully'));
    }
}
