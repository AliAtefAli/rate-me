<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Store;
use App\Traits\Uploadable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Uploadable;

    public function index()
    {
        $categories = Category::with('translation')
            ->paginate(10);

        return view('dashboard.categories.index', compact('categories'));
    }


    public function create()
    {
//        return view('dashboard.categories.create');
    }


    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            $path = $this->uploadOne($request['image'], 'categories', null, null);
            $data['image'] = $path;
        }

        Category::create($data);

        return back()->with('success', trans('dashboard.category.created successfully'));
    }


    public function show(Category $category)
    {
        $category->load('stores.translations', 'translation');

        $users = User::all();

        return view('dashboard.categories.show', compact('category', 'users'));

    }


    public function edit(Category $category)
    {
//        return view('dashboard.categories.edit', compact('category'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            if (file_exists(asset('assets/uploads/categories/' . $category->image))) {
                unlink( asset('assets/uploads/categories/' . $category->image) );
            }
            $path = $this->uploadOne($request['image'], 'categories', null, null);
            $data['image'] = $path;
        }

        $category->update($data);

        return back()->with('success', trans('dashboard.category.updated successfully'));

    }


    public function destroy(Category $category)
    {
        if ($category->stores()->count() > 0) {
            return redirect()->route('category.index')->with('error', trans('dashboard.category.has menus'));

        }
        $category->delete();

        return redirect()->route('category.index')->with('success', trans('dashboard.category.deleted successfully'));
    }
}
