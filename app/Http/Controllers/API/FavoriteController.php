<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiTrait;

class FavoriteController extends Controller
{
    use ApiTrait;

    public function show($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites;

        return $this->returnData($favorites);
    }

}
