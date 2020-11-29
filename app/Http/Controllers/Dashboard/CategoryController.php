<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'ar' => ['name' => $request->ar['name'], 'description' => $request->ar['description']],
            'en' => ['name' => $request->en['name'], 'description' => $request->en['description']],
        ]);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $stores = Store::where('category_id', $category->id);

        dd($stores->first());
        return view('dashboard.categories.show', compact('stores'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $updated = $category->update([
            'ar' => ['name' => $request->ar['name'], 'description' => $request->ar['description']],
            'en' => ['name' => $request->en['name'], 'description' => $request->en['description']],
        ]);

        if ($updated) {
            session()->flash('success', 'تم تعديل القسم بنجاح');
        } else {
            session()->flash('error', 'لم يتم تعديل القسم من فضلك اعد مرة اخري');
        }

        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $deleted = $category->delete();
        if ($deleted) {
            session()->flash('success', 'تم حذف القسم بنجاح');
        } else {
            session()->flash('error', 'لم يتم حذف القسم من فضلك اعد مرة اخري');
        }

        return redirect()->route('category.index');
    }
}
