<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $stores =  Store::all()->count();
        $products =  Product::all()->count();
       return view('dashboard.index', compact('users', 'stores', 'products'));
    }
}
