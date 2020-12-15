<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $category->load('stores.translations', 'translation');

        return view('site.categories.show', compact('category'));
    }
}
