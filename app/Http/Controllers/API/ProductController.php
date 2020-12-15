<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiTrait;
    public function index($id)
    {
        $product = Product::find($id);

        return $this->returnData($product);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $product = Product::find($id)->load('additions.translations', 'translation');

        return $this->returnData($product);
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
