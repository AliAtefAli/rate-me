<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Store;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();

        return view('dashboard.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all();
        return view('dashboard.menu.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = Menu::create($request->all());

        if ($menu) {
            session()->flash('success', 'تمت اضافة المنيو بنجاح');
        } else {
            session()->flash('error', 'لم يتم اضافة المنيو من فضلك اعد مرة اخري');
        }


        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $stores = Store::all();
        return view('dashboard.menu.edit', compact('menu', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $updated = $menu->update($request->all());
        if ($updated) {
            session()->flash('success', 'تم تعديل المنيو بنجاح');
        } else {
            session()->flash('error', 'لم يتم تعديل المنيو من فضلك اعد مرة اخري');
        }

        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $deleted = $menu->delete();

        if ($deleted) {
            session()->flash('success', 'تم حذف المنيو بنجاح');
        } else {
            session()->flash('error', 'لم يتم حذف المنيو من فضلك اعد مرة اخري');
        }

        return redirect()->route('menu.index');
    }
}
