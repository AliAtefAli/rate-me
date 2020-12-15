<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class RateController extends Controller
{
    use ApiTrait;

    public function store(Request $request)
    {
        return $this->returnData($request->all());
    }

}
